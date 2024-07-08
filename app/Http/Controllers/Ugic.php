<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\JobsModel;
use App\Models\JobDetails;
use Illuminate\Support\Facades\Http;
use App\Models\FailedJobsModel;
use App\Http\Controllers\helper;
use Illuminate\Support\Facades\File;

class Ugic extends Controller
{
  public function index()
  {
    //
    //$urls = Url::with('user')->latest()->get();
    $jobdetails = JobDetails::all();
    $data = collect();

    if (count($jobdetails) <= 0) {

      return view('koboapdf.index', ["data" => []]);
    }

    $jobdetails->each(function ($job) use ($data) {

      $dominio = $job->dominio;

      $dominioTitle = $dominio == 'kf.acf-e.org' ? 'kc.acf-e.org' : $dominio;
      $formid = $job->uui;
      $token = $job->token;
      $name_key = $job->name_key;
      //

      $jsonurlDataEnketo = "https://" . $dominio . "/assets/" . $formid . "/submissions/?format=json";
      $jsonurlDataTitle = "https://" . $dominioTitle . "/api/v1/forms?id_string=" . $formid;
      //'timeout' => 1200,  //1200 Seconds is 20 Minutes

      $dataEnketoResponse = Http::withHeaders([
        'Authorization' => 'Token ' . $token . '',
        'Accept' => 'application/json'
      ])
        ->get($jsonurlDataEnketo)
        ->json();

      $filesExported = Storage::files("/htmlToPdf/" . $name_key . "/");

      $jobsCreated = JobsModel::where("payload", "like", "%" . $name_key . "%")->get();
      $jobsFailed = FailedJobsModel::where("payload", "like", "%" . $name_key . "%")->get();

      //sino hay almenos un primer resutlado
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

      //dd("commandUui", $commandUui, ($jobsFirstPayload->data->command));

      //validar si las descargas estan lsitas y mostrar el enlace de descarga
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
          $download = "/public/" . public_path($zipFileName);
        }
      }

      $dataExport = json_decode(collect([
        "name_key" => $name_key,
        "exportaciones_totales" => count($dataEnketoResponse),
        "exportaciones_procesadas" => count($filesExported),
        "exportaciones_faltantes" => count($dataEnketoResponse) - count($filesExported),
        "exportaciones_fallidos" => count($jobsFailed),
        "trabajos_en_proceso" => count($jobsCreated),
        "download" => $download
      ]));

      //validar si las descargas estan lsitas y mostrar el enlace de descarga



      $data->push($dataExport);
    });

    //dd($data->toArray()[0]->exportaciones_totales);

    return view('koboapdf.index', ["data" => $data->all()]);
  }
}
