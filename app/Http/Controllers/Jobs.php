<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jobs\generatePdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use App\Models\JobsModel;
use App\Models\FailedJobsModel;
use App\Models\JobDetails;
use App\Models\migrateCustom;
use App\Http\Controllers\helper;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Search;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Artisan;

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

    $limit_minutes = 900;
    ini_set('default_socket_timeout', $limit_minutes); // 900 Seconds = 15 Minutes
    ini_set('memory_limit', '2044M');
    set_time_limit($limit_minutes); //0
    ini_set('max_execution_time', '' . $limit_minutes . '');
    ini_set('max_input_time', '' . $limit_minutes . '');

    $dominio = "kf.acf-e.org";
    $form = $request->all();

    $token = $request->token;
    $id = $request->id;

    if (isset($request->dominio)) {
      //parche para el dominio cuando este trae https
      if (strpos($request->dominio, 'https') !== false) {
        $dominio = str_replace('https://', '', $request->dominio);
        $dominio = str_replace('/', '', $request->dominio);
      } else if (strpos($request->dominio, 'http') !== false) {
        $dominio = str_replace('http://', '', $request->dominio);
        $dominio = str_replace('/', '', $request->dominio);
      } else {
        $dominio = $request->dominio;
      }
    }

    $name_key = "cash_echo";

    if (isset($request->name_key)) {
      $name_key = $request->name_key;
    }

    $filesExported = Storage::files("/htmlToPdf/" . $name_key . "/");

    $timestart = time();

    $formid = $id;

    $dominioTitle =  $dominio == 'kf.acf-e.org' ? 'kc.acf-e.org' : ($dominio == 'eu.kobotoolbox.org' ? 'kc-eu.kobotoolbox.org' :  $dominio);

    //se gaurdan las variables creadas para esta exportacion para tener un registro de la configuracion y una mejor bisqeda
    if (isset($dominioTitle) && isset($formid) && isset($token) && isset($request->filtrar) && collect($request->filtrar)->search('filter') >= 0) {

      $dataFormulario = [];

      $jobDetails = JobDetails::firstOrCreate([
        "dominio" => $dominio,
        "name_key" => $name_key,
        "uui" => $formid,
        "token" => $token,
      ]);

      $jsonurlDataTitle = "https://" . $dominio . "/assets/" . $formid . "/submissions/?format=json";

      $dataTitleResponse = Http::withHeaders([
        'Authorization' => 'Token ' . $token . '',
        'Accept' => 'application/json'
      ])
        ->get($jsonurlDataTitle)
        ->json();

      if (optional($dataTitleResponse)->detail == 'Not found.') {

        //return redirect('/koboapdf')->with('error', 'Not found.');
        return redirect()->route('koboapdf', ["data" => [], "uui" => ($formid), "filtrar" => ($request->filtrar)])->with('error', 'Error!  ' . $dataTitleResponse['detail']);
      }

      if (!is_array($dataTitleResponse)) {
        return redirect()->route('koboapdf', ["data" => [], "uui" => ($formid), "filtrar" => ($request->filtrar)])->with('error', 'Error!  ' . $dataTitleResponse['detail']);
      }

      if (count($dataTitleResponse) > 0) {

        $dataFormulario = collect(collect($dataTitleResponse)->first())->keys()->all();
      }

      array_push($form['filtrar'], 'filtered');

      $dataFormulario = json_encode($dataFormulario);

      JobDetails::where("uui", $jobDetails->uui)->update([
        "otro" => $dataFormulario
      ]);

      return redirect()->route('koboapdf', ["data" => [], "uui" => ($formid), "filtrar" => ($request->filtrar)])->with('success', 'Parametros del formulario cargados, falta un paso mas!');
    }

    if (!isset($request->dominio) || !isset($request->id) || !isset($request->token) || !isset($request->name_key)) {
      return redirect()->route('koboapdf', ["data" => [], "uui" => ($formid), "filtrar" => ($request->filtrar)])->with('error', 'Error! faltan parametros');
    }

    //se gaurdan las variables creadas para esta exportacion para tener un registro de la configuracion y una mejor bisqeda
    JobDetails::updateOrCreate([
      "dominio" => $dominio,
      "name_key" => $name_key,
      "uui" => $formid,
      "token" => $token
    ]);


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


    $name_fomulary = "Hubo un problema al obtener el nomnre del formulario";
    $metaFiles = [];
    //dd($dataTitleResponse, $token, $jsonurlDataTitle, $formid);
    //titulo del formulario
    if (count($dataTitleResponse) > 0) {
      $name_fomulary = collect($dataTitleResponse[0])['title'];
      $formdata = json_decode(json_encode(collect($dataTitleResponse)->first()), FALSE);
      $metaFiles =  collect($formdata->metadata); //data_file

    }

    //filtrando los formularios que ya han sido exportados con filesexported con los formularios consultados dataenketoresponse
    $dataEnketoResponseFiltered = collect($dataEnketoResponse)->filter(function ($item, $key) use ($filesExported) {

      $filesExportedCollect = collect($filesExported);

      $filesExportedCollect = $filesExportedCollect->map(function ($fileExport) {
        $extract_id = explode('_', $fileExport);
        $extract_id = str_replace(".pdf", "", $extract_id[1]);
        return '' . $extract_id . '';
      });

      return ($filesExportedCollect->search($item['_id'])) === false;
    });

    $dataEnketo = collect($dataEnketoResponseFiltered); //->chunk(45)

    //verifico si la descarga ya esta lsita
    if (count($dataEnketoResponse) == count($filesExported)) {

      $resultCreated = helper::makeZipWithFiles($name_key . ".zip", $filesExported);

      if ($resultCreated === true) {
        return response()->download(public_path($name_key . ".zip"))->deleteFileAfterSend(true);
      } else {
        return response()->json(['status' => false, 'message' => $resultCreated], 503);
      }
    }

    //contruyrndo las imagenes del formulario
    //[0]
    $dataEnketoWithImage = collect($dataEnketo->map(function ($chield) use ($token, $filesExported, $formid) {
      $formulario = collect($chield); //->forget('name');

      $claves = collect($formulario->keys())->filter()->all();
      $valores =  array_values($formulario->toArray());

      //recorreindo las preguntas keys
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

    $paramsForm = $request->paramForm;
    //filtro segun lo especificado
    //recorro los formularios con map y recorro las preguntas con map sino estan las sacco
    if (count(collect(collect($dataEnketoWithImage)->first())->keys()) !== count($paramsForm)) {
      $dataEnketoWithImage = collect($dataEnketo->map(function ($chield) use ($paramsForm) {
        $formulario = collect($chield); //->forget('name');
        $keysCurrent = $formulario->keys();

        $diff = $keysCurrent->diff($paramsForm);

        $deleteDiff = $diff->first();

        $filtered = $formulario->except($deleteDiff);

        //se ordena por las keys
        $filtered = collect($filtered)->sortKeys();

        return $filtered;
      }));
    }


    //se ajusta el meta del formulario para que se obtengas las imagenes del formulario son otras
    $dataMetaWithImage = $metaFiles;
    /* ($metaFiles->map(function ($chield) use ($token) {

      $metaF = ($chield); //->forget('name');

      $imageMetaResponse = Helper::getImageWithHeaders($metaF->url, $token);

      $metaF->data_file = $imageMetaResponse ?? $metaF->data_file;

      return $metaF;
    })); */

    $dataEnketoWithImage->filter()->all();

    //aqui creo los jobs que no han sido procesados
    $dataEnketoWithImage->each(function (Collection $item) use ($timestart, $limit_minutes, $dataEnketoResponse, $name_key, $name_fomulary, $dataMetaWithImage) {

      $id_file = $item->get('_id');

      $filename = '/htmlToPdf/' . $name_key . '/' . $name_fomulary . '_' . $id_file . '.pdf';

      //$existQueue = JobsModel::where("payload", "like", "%" . $id_file . "%")->exists(); && !$existQueue

      if (!Storage::disk('local')->exists($filename)) {
        if (isset($item)   && isset($filename)) {
          //dd($item);
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

    /* if (count($dataEnketoResponse) == count($filesExported)) {

      $resultCreated = helper::makeZipWithFiles($name_key . ".zip", $filesExported);

      //$ramdom = Carbon\Carbon::now()->timestamp;
      //dd(Carbon\Carbon::now()->timestamp, time());

      if ($resultCreated === true) {
        return response()->download(public_path($name_key . ".zip"))->deleteFileAfterSend(true);
      } else {
        return response()->json(['status' => false, 'message' => $resultCreated], 503);
      }
    } else { */
    /* 
    $filesExported = Storage::files("/htmlToPdf/" . $name_key . "/");

    $jobsCreated = JobsModel::all();

    $download = ""; */

    //compruebo sy todo se completo para ofrecer la descarga zip
    /* if (count($dataEnketoResponse) == count($filesExported)) {
      $zipFileName = $name_key . ".zip";

      if (!File::exists(public_path($zipFileName))) {

        $resultCreated = helper::makeZipWithFiles($zipFileName, $filesExported);

        if ($resultCreated === true) {
          //$download = public_path($zipFileName);
          $download = "/public/" . ($zipFileName);
        } else {
          $download = "fallo al generar el archivos";
          //return response()->json(['status' => false, 'message' => $resultCreated], 503);
        }
      } else {
        //$download = public_path($zipFileName);
        $download = "/public/" . ($zipFileName);
      }
    } */

    /* $dataExport = json_decode(collect([
      "name_key" => ($name_key),
      "exportaciones_totales" => count($dataEnketoResponse),
      "exportaciones_procesadas" => count($filesExported),
      "exportaciones_faltantes" => count($dataEnketoResponse) - count($filesExported),
      "exportaciones_fallidos" => 0,
      "trabajos_en_proceso" => count($jobsCreated),
      "download" => $download
    ]));

    $data = [$dataExport]; */

    //MQR devolver tabla con los resultados creados 
    return redirect()->route('koboapdf', ["name_key" => ""])->with('success', 'Formulario solicitado con exito!');;
    //return view('koboapdf.index', ["name_key" => "", "data" => serialize($data)]);
    //}

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

    $dominioTitle =  $dominio == 'kf.acf-e.org' ? 'kc.acf-e.org' : ($dominio == 'eu.kobotoolbox.org' ? 'kc-eu.kobotoolbox.org' :  $dominio);
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

  public function addFilterProcessExportView(Request $request)
  {

    $dominioTitle = "kf.acf-e.org";

    if (isset($request->dominio)) {
      $dominioTitle = $request->dominio;
    }

    $id = $request->id;
    $formid = $id;

    $token = $request->token;

    if (isset($dominioTitle) && isset($formid) && isset($token) && optional($request)->filtrar . contains('filtrar')) {

      $dataFormulario = [];

      $jsonurlDataTitle = "https://" . $dominioTitle . "/api/v1/forms?id_string=" . $formid;

      $dataTitleResponse = Http::withHeaders([
        'Authorization' => 'Token ' . $token . '',
        'Accept' => 'application/json'
      ])
        ->get($jsonurlDataTitle)
        ->json();


      if (count($dataTitleResponse) > 0) {

        $dataFormulario = $dataTitleResponse->map(function ($form) {
          return ($form->title);
        });

        $dataFormulario = json_decode(json_encode(collect($dataFormulario)), FALSE);

        dd("dataFormulario", $dataFormulario);
      }


      return view('koboapdf.index', ["name_key" => "name_key", "data" => [], "filtrar" => $request->filtrar, "dataFormulario" => $dataFormulario]);
    } else {
      return redirect('/koboapdf')->with('error', 'Error! faltan parametros');
    }
  }

  public function getProccessExportView(Request $request)
  {

    if (!isset($request->name_key)) {
      return redirect('/koboapdf');
    }

    $exportaciones_nuevas = false;


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
      return view('koboapdf.index', ["name_key" => "", "data" => []]);
    }

    $dominio = $jobdetails->dominio;

    $dominioTitle =  $dominio == 'kf.acf-e.org' ? 'kc.acf-e.org' : ($dominio == 'eu.kobotoolbox.org' ? 'kc-eu.kobotoolbox.org' :  $dominio);
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

    $faltantes = count($dataEnketoResponse) - count($filesExported);

    //$exportaciones_nuevas
    //verificar sii hay faltantes de la migracion
    //exportaciones_nuevas
    if ($faltantes > 0 && count($jobsCreated) == 0) {
      $exportaciones_nuevas = true;
    }

    if (!($jobsCreated->first())) {

      $download = "";

      if (count($dataEnketoResponse) == count($filesExported)) {
        $zipFileName = $name_key . ".zip";

        if (!File::exists(public_path($zipFileName))) {

          $resultCreated = helper::makeZipWithFiles($zipFileName, $filesExported);

          //$ramdom = Carbon\Carbon::now()->timestamp;
          //dd(Carbon\Carbon::now()->timestamp, time());

          if ($resultCreated === true) {
            //$download = public_path($zipFileName);
            $download = "/public/" . ($zipFileName);
          } else {
            $download = "fallo al generar el archivos";
            //return response()->json(['status' => false, 'message' => $resultCreated], 503);
          }
        } else {
          //$download = public_path($zipFileName);
          $download = "/public/" . ($zipFileName);
        }
      }
      //verificar si hay fallidos

      $dataExport = json_decode(collect([
        "name_key" => ($name_key),
        "exportaciones_totales" => count($dataEnketoResponse),
        "exportaciones_procesadas" => count($filesExported),
        "exportaciones_faltantes" => $faltantes,
        "exportaciones_fallidos" => count($jobsFailed),
        "trabajos_en_proceso" => count($jobsCreated),
        "exportaciones_nuevas" => $exportaciones_nuevas,
        "download" => $download
      ]));

      $data = [$dataExport];


      //MQR devolver tabla con los resultados creados 
      return view('koboapdf.index', ["name_key" => "name_key", "data" => $data]);
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

    $download = "";

    if (count($dataEnketoResponse) == count($filesExported)) {
      $zipFileName = $name_key . ".zip";

      if (!File::exists(public_path($zipFileName))) {

        $resultCreated = helper::makeZipWithFiles($zipFileName, $filesExported);

        //$ramdom = Carbon\Carbon::now()->timestamp;
        //dd(Carbon\Carbon::now()->timestamp, time());

        if ($resultCreated === true) {
          //$download = public_path($zipFileName);
          $download = "/public/" . ($zipFileName);
        } else {
          $download = "fallo al generar el archivos";
          //return response()->json(['status' => false, 'message' => $resultCreated], 503);
        }
      } else {
        //$download = public_path($zipFileName);
        $download = "/public/" . ($zipFileName);
      }
    }

    $dataExport = json_decode(collect([
      "name_key" => ($name_key),
      "exportaciones_totales" => count($dataEnketoResponse),
      "exportaciones_procesadas" => count($filesExported),
      "exportaciones_faltantes" => count($dataEnketoResponse) - count($filesExported),
      "exportaciones_fallidos" => count($jobsFailed),
      "trabajos_en_proceso" => count($jobsCreated),
      "exportaciones_nuevas" => $exportaciones_nuevas,
      "download" => $download
    ]));

    $data = [$dataExport];

    //MQR devolver tabla con los resultados creados 
    return view('koboapdf.index', ["name_key" => "", "data" => $data]);
  }

  public function repair()
  {
    try {
      //code...

      $exitCode = Artisan::call('queue:retry all', []);

      $data = [
        "exitCode" => $exitCode
      ];

      return redirect('/koboapdf')->with(['success' => 'Datos reparados con exito.']);
    } catch (\Throwable $th) {
      //throw $th;
      return redirect('/koboapdf')->with(['error' => 'Error! al procezar los datos']);
    }
  }
}
