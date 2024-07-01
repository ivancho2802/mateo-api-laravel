<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jobs\generatePdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use App\Models\JobsModel;
use App\Models\FailedJobsModel;
use App\Models\JobDetails;
use App\Models\migrateCustom;

class Jobs extends Controller
{
  //

  function deploy(Request $request)
  {

    $jobname = $request->jobname;

    if ($jobname == 'generate_pdf') {

      /* generatePdf::dispatch();//->onConnection('database');
            generatePdf::dispatchAfterResponse(); */


      //desplegar en una cola diferente
      //generatePdf::dispatch()->onQueue('cola2');


    }
  }
  /**
   * Servicio para crear pdf apartir de un kobo
   * no es de forma dinamica es posible que varios datos no funcionen
   * 
   * 
   * params
   * formid
   * token
   * ---
   * dominio
   */
  public function exportByuui(Request $request)
  {
    /* try { */

    //dd($request->dominio, $token);

    $limit_minutes = 900;
    ini_set('default_socket_timeout', $limit_minutes); // 900 Seconds = 15 Minutes
    ini_set('memory_limit', '2044M');
    set_time_limit($limit_minutes); //0
    ini_set('max_execution_time', '' . $limit_minutes . '');
    ini_set('max_input_time', '' . $limit_minutes . '');

    $dominio = "kf.acf-e.org";

    $token = $request->token;
    $id = $request->id;

    if (isset($request->dominio)) {
      $dominio = $request->dominio;
    }

    $name_key = "cash_echo";

    if (isset($request->name_key)) {
      $name_key = $request->name_key;
    }

    $filesExported = Storage::files("/htmlToPdf/" . $name_key . "/");

    $timestart = time();

    $formid = $id;

    //se gaurdan las variables creadas para esta exportacion para tener un registro de la configuracion y una mejor bisqeda
    JobDetails::create([
      "dominio" => $dominio,
      "name_key" => $name_key,
      "uui" => $formid,
      "token" => $token
    ]);

    $dominioTitle = $dominio == 'kf.acf-e.org' ? 'kc.acf-e.org' : $dominio;

    //https://kc.kobotoolbox.org/api/v1/data/28058/20/enketo?return_url=url
    //$jsonurlDataEnketo = "https://kc.acf-e.org/api/v1/data/" . $formid . "/" . $dataId . "/enketo?return_url=false";
    //$jsonurlDataEnketo = "https://kc.acf-e.org/api/v1/data/" . $formid;
    $jsonurlDataEnketo = "https://" . $dominio . "/assets/" . $formid . "/submissions/?format=json";
    $jsonurlDataTitle = "https://" . $dominioTitle . "/api/v1/forms?id_string=" . $formid;
    //'timeout' => 1200,  //1200 Seconds is 20 Minutes

    $dataEnketoResponse = Http::withHeaders([
      'Authorization' => 'Token ' . $token . '',
      'Accept' => 'application/json'
    ])
      ->get($jsonurlDataEnketo)
      ->json();

    $dataTitleResponse = Http::withHeaders([
      'Authorization' => 'Token ' . $token . '',
      'Accept' => 'application/json'
    ])
      ->get($jsonurlDataTitle)
      ->json();

    //dd($dataTitleResponse);

    $name_fomulary = "Acuerdo De Transferencia Monetarias - Cash ECHO";
    $metaFiles = [];
    //titulo del formulario
    if (count($dataTitleResponse) > 0) {
      $name_fomulary = collect($dataTitleResponse[0])['title'];
      $formdata = json_decode(json_encode(collect($dataTitleResponse)->first()), FALSE);
      $metaFiles =  collect($formdata->metadata); //data_file
      
    }


    $dataEnketoResponseFiltered = collect($dataEnketoResponse)->filter(function ($item, $key) use ($filesExported) {

      $filesExportedCollect = collect($filesExported);

      $filesExportedCollect = $filesExportedCollect->map(function ($fileExport) {
        $extract_id = explode('_', $fileExport);
        $extract_id = str_replace(".pdf", "", $extract_id[1]);
        return '' . $extract_id . '';
      });

      return ($filesExportedCollect->search($item['_id'])) === false;
    });

    $dataEnketo = collect($dataEnketoResponseFiltered)->chunk(45);

    if (count($dataEnketoResponse) == count($filesExported)) {

      $resultCreated = helper::makeZipWithFiles($name_key . ".zip", $filesExported);

      if ($resultCreated === true) {
        return response()->download(public_path($name_key . ".zip"))->deleteFileAfterSend(true);
      } else {
        return response()->json(['status' => false, 'message' => $resultCreated], 503);
      }
    }

    //contruyrndo las imagenes del formulario

    $dataEnketoWithImage = collect($dataEnketo[0]->map(function ($chield) use ($token, $filesExported, $formid) {
      $formulario = collect($chield); //->forget('name');

      $claves = collect($formulario->keys())->filter()->all();
      $valores =  array_values($formulario->toArray());

      for ($i = 0; $i < count($claves); $i++) {
        # code...
        $clave = ($claves[$i]);
        $valor = $valores[$i];

        if (!is_array($valor) && isset($clave)) {

          if (
            (stripos($valor, '.jpg') !== false && stripos($valor, '.jpg') == (strlen($valor) - strlen('.jpg'))) ||
            (stripos($valor, '.png') !== false && stripos($valor, '.png') == (strlen($valor) - strlen('.png'))) ||
            (stripos($valor, '.jpeg') !== false && stripos($valor, '.jpeg') == (strlen($valor) - strlen('.jpeg'))) ||
            (stripos($valor, '.svg') !== false && stripos($valor, '.svg') == (strlen($valor) - strlen('.svg')))
          ) {


            $verificationImage = migrateCustom::where([
              'table' => $formid,
              'file_ref' => $valor . $formulario['_id']
            ]);

            if ($verificationImage->exists()) {
              $formulario[$clave] = $verificationImage->first()->table_id;
              continue;
            }

            $chield_attachments = collect($chield['_attachments']);

            $urlImgFirst = $chield_attachments->filter(function ($atached) use ($valor) {
              return isset($atached['download_url']) && (stripos($atached['download_url'], $valor) !== false);
            });


            $urlImg = collect($urlImgFirst);
            //dd("urlImg", $urlImg, $urlImg->first(), $urlImg->first()['download_url']);

            if (count($urlImgFirst) > 0) {

              //convertir la imagen en su respuesta
              $imageResponse = Helper::getImageWithHeaders($urlImg->first()['download_url'], $token);

              $formulario[$clave] = $imageResponse ?? $urlImg->first()['download_url'];

              migrateCustom::create([
                'table' => $formid,
                'table_id' => $formulario[$clave],
                'file_ref' => $valor . $formulario['_id']
              ]);
            }
            /* elsedd("esto no deberia psasr"); */
          }
        }
      }

      return $formulario;
    }));

    //se ajusta el meta del formulario para que se obtengas las imagenes del formulario son otras
    $dataMetaWithImage = ($metaFiles->map(function ($chield) use ($token) {

      $metaF = ($chield); //->forget('name');

      $imageMetaResponse = Helper::getImageWithHeaders($metaF->url, $token);

      $metaF->data_file = $imageMetaResponse ?? $metaF->data_file;

      return $metaF;
    }));

    $dataEnketoWithImage->filter()->all();

    $dataEnketoWithImage->each(function (Collection $item) use ($timestart, $limit_minutes, $dataEnketoResponse, $name_key, $name_fomulary, $dataMetaWithImage) {

      $id_file = $item->get('_id');

      $filename = '/htmlToPdf/' . $name_key . '/' . $name_fomulary . '_' . $id_file . '.pdf';

      $existQueue = JobsModel::where("payload", "like", "%" . $id_file . "%")->exists();

      if (!Storage::disk('local')->exists($filename) && !$existQueue) {
        if (isset($item)   && isset($filename)) {
          generatePdf::dispatch($item, $filename, $dataMetaWithImage); //->onConnection('database');
          //generatePdf::dispatchAfterResponse();
        }
      }

      $currentTimeExecuted = time() - $timestart;

      $limit_minutes_ajust = $limit_minutes - 100;
      //echo $currentTimeExecuted . " > " . $limit_minutes_ajust . ' = ' . (intval($currentTimeExecuted) > intval($limit_minutes_ajust)) . "\n";

      if (intval($currentTimeExecuted) >= intval($limit_minutes_ajust)) {

        $filesExported = Storage::files("/htmlToPdf/" . $name_key . "/");
        echo "exportaciones totales" . count($dataEnketoResponse) . " \n";
        echo "exportaciones procesadas" . count($filesExported) . " \n";
        echo "exportaciones faltantes" . (count($dataEnketoResponse) - count($filesExported)) . " \n";

        return response()->json([
          "exportaciones totales" => count($dataEnketoResponse),
          "exportaciones procesadas" => count($filesExported),
          "exportaciones faltantes" => count($dataEnketoResponse) - count($filesExported),
        ]);
      }
    });

    /* return response()
            ->view('pdf.formulario', ["data" => $dataEnketoWithImage->first()], 200);
            dd("esta en 45 no se proceso por time out ver como estan los estilos con uno revisar des pues de _318932"); */

    if (count($dataEnketoResponse) == count($filesExported)) {

      $resultCreated = helper::makeZipWithFiles($name_key . ".zip", $filesExported);

      //$ramdom = Carbon\Carbon::now()->timestamp;
      //dd(Carbon\Carbon::now()->timestamp, time());

      if ($resultCreated === true) {
        return response()->download(public_path($name_key . ".zip"))->deleteFileAfterSend(true);
      } else {
        return response()->json(['status' => false, 'message' => $resultCreated], 503);
      }
    } else {

      $filesExported = Storage::files("/htmlToPdf/" . $name_key . "/");

      $jobsCreated = JobsModel::all();

      /* return response()->json([
        "exportaciones totales" => count($dataEnketoResponse),
        "exportaciones procesadas" => count($filesExported),
        "exportaciones faltantes" => count($dataEnketoResponse) - count($filesExported),
        "trabajos en proceso" => count($jobsCreated)
      ]); */

      $dataExport = json_decode(collect([
        "exportaciones_totales" => count($dataEnketoResponse),
        "exportaciones_procesadas" => count($filesExported),
        "exportaciones_faltantes" => count($dataEnketoResponse) - count($filesExported),
        "exportaciones_fallidos" => 0,
        "trabajos_en_proceso" => count($jobsCreated)
      ]));

      $data = [$dataExport];

      //MQR devolver tabla con los resultados creados 
      return view('koboapdf.index', ["data" => $data]);

    }

    /* return response()
            ->view('pdf.formulario', ["data" => $dataEnketoWithImage->first()], 200)
            ->header('Authorization', 'Token ' . $token); */
    /* } catch (\Throwable $th) {
            

            $filesExported = Storage::files("/htmlToPdf/". $name_key ."/");

            return response()->json([
                "error" => $th,
                "exportaciones procesadas" => count($filesExported),
            ]);
        } */
  }

  public function getProccessExport(Request $request)
  {

    $name_key = $request->name_key;
    /* 
            "dominio" => $dominio,
            "name_key" => $name_key,
            "uui" => $formid,
            "token" => $token
        */
    $jobdetails = JobDetails::where("name_key", "like", "%" . $name_key . "%")->first();

    $dominio = $jobdetails->dominio;

    $dominioTitle = $dominio == 'kf.acf-e.org' ? 'kc.acf-e.org' : $dominio;
    $formid = $jobdetails->uui;
    $token = $jobdetails->token;
    //
    $filesExported = Storage::files("/htmlToPdf/" . $name_key . "/");


    $jobsCreated = JobsModel::where("payload", "like", "%" . $name_key . "%")->get();

    $jobsFirstPayload = json_decode($jobsCreated->first()->payload);

    $command = $jobsFirstPayload->data->command;

    //buscar el uui para el formulario y asi sacar cuantos formularios hay
    $commandArray = collect(explode(";s:", $command));

    $indexCommand = $commandArray->search(function ($com) {
      return strpos($com, "_xform_id_string") >= 0;
    });

    $commandUuiStr = null;

    if ($indexCommand !== -1) {
      $commandUuiStr = $commandArray[$indexCommand + 1];
    } else {
      return response()->json([
        "msg" => "algo salio mal lo sentimos"
      ]);
    }

    $commandUuiStr = explode("\"", $commandUuiStr);

    if (isset($commandUuiStr) && count($commandUuiStr) > 0) {
      $commandUui = $commandUuiStr[1];
    }

    if (!isset($commandUui)) {
      return response()->json([
        "msg" => "algo salio mal lo sentimos commandUui"
      ]);
    }

    //dd("commandUui", $commandUui, ($jobsFirstPayload->data->command));

    $jsonurlDataEnketo = "https://" . $dominio . "/assets/" . $formid . "/submissions/?format=json";
    $jsonurlDataTitle = "https://" . $dominioTitle . "/api/v1/forms?id_string=" . $formid;
    //'timeout' => 1200,  //1200 Seconds is 20 Minutes

    $dataEnketoResponse = Http::withHeaders([
      'Authorization' => 'Token ' . $token . '',
      'Accept' => 'application/json'
    ])
      ->get($jsonurlDataEnketo)
      ->json();


    return response()->json([
      "exportaciones totales" => count($dataEnketoResponse),
      "exportaciones procesadas" => count($filesExported),
      "exportaciones faltantes" => count($dataEnketoResponse) - count($filesExported),
      "trabajos en proceso" => count($jobsCreated)
    ]);
  }

  public function getProccessExportView(Request $request)
  {

    $name_key = $request->name_key;
    /* 
          "dominio" => $dominio,
          "name_key" => $name_key,
          "uui" => $formid,
          "token" => $token
      */
    $jobdetails = JobDetails::where("name_key", "like", "%" . $name_key . "%")->first();

    if (!isset($jobdetails)) {

      //MQR devolver tabla con los resultados creados 
      return view('koboapdf.index', ["data" => []]);
    }

    $dominio = $jobdetails->dominio;

    $dominioTitle = $dominio == 'kf.acf-e.org' ? 'kc.acf-e.org' : $dominio;
    $formid = $jobdetails->uui;
    $token = $jobdetails->token;
    //
    $filesExported = Storage::files("/htmlToPdf/" . $name_key . "/");


    $jobsCreated = JobsModel::where("payload", "like", "%" . $name_key . "%")->get();

    //dd("commandUui", $commandUui, ($jobsFirstPayload->data->command));

    $jsonurlDataEnketo = "https://" . $dominio . "/assets/" . $formid . "/submissions/?format=json";
    $jsonurlDataTitle = "https://" . $dominioTitle . "/api/v1/forms?id_string=" . $formid;
    //'timeout' => 1200,  //1200 Seconds is 20 Minutes

    $dataEnketoResponse = Http::withHeaders([
      'Authorization' => 'Token ' . $token . '',
      'Accept' => 'application/json'
    ])
      ->get($jsonurlDataEnketo)
      ->json();

    $jobsFailed = FailedJobsModel::where("payload", "like", "%" . $name_key . "%")->get();

    if (!($jobsCreated->first())) {

      //verificar si hay fallidos


      $dataExport = json_decode(collect([
        "exportaciones_totales" => count($dataEnketoResponse),
        "exportaciones_procesadas" => count($filesExported),
        "exportaciones_faltantes" => count($dataEnketoResponse) - count($filesExported),
        "exportaciones_fallidos" => count($jobsFailed),
        "trabajos_en_proceso" => count($jobsCreated)
      ]));

      $data = [$dataExport];


      //MQR devolver tabla con los resultados creados 
      return view('koboapdf.index', ["data" => $data]);
    }

    $jobsFirstPayload = json_decode($jobsCreated->first()->payload);

    $command = $jobsFirstPayload->data->command;

    //buscar el uui para el formulario y asi sacar cuantos formularios hay
    $commandArray = collect(explode(";s:", $command));

    $indexCommand = $commandArray->search(function ($com) {
      return strpos($com, "_xform_id_string") >= 0;
    });

    $commandUuiStr = null;

    if ($indexCommand !== -1) {
      $commandUuiStr = $commandArray[$indexCommand + 1];
    } else {
      return response()->json([
        "msg" => "algo salio mal lo sentimos"
      ]);
    }

    $commandUuiStr = explode("\"", $commandUuiStr);

    if (isset($commandUuiStr) && count($commandUuiStr) > 0) {
      $commandUui = $commandUuiStr[1];
    }

    if (!isset($commandUui)) {
      return response()->json([
        "msg" => "algo salio mal lo sentimos commandUui"
      ]);
    }


    $dataExport = json_decode(collect([
      "exportaciones_totales" => count($dataEnketoResponse),
      "exportaciones_procesadas" => count($filesExported),
      "exportaciones_faltantes" => count($dataEnketoResponse) - count($filesExported),
      "exportaciones_fallidos" => count($jobsFailed),
      "trabajos_en_proceso" => count($jobsCreated)
    ]));

    $data = [$dataExport];

    //MQR devolver tabla con los resultados creados 
    return view('koboapdf.index', ["data" => $data]);
  }
}
