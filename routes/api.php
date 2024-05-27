<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\MFormulario;
use App\Models\MFormularios;
use App\Models\MKoboFormularios;
use App\Models\DContactos;
use App\Http\Controllers\helper;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
//use Excel;
use App\Http\Controllers\Auth;
use App\Http\Controllers\echoController;
use App\Models\MGrupos;
use App\Models\MUsuarios;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use SebastianBergmann\Diff\Chunk;
use App\Http\Controllers\Jobs;

//ini_set('internal_encoding', 'utf-8');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix('meal')->group(function () {

  //lista de personas atendidas
  Route::get('/lpa/download', [App\Http\Controllers\Media::class, 'downloadMedia']);

  Route::post('/lpa/upload', [App\Http\Controllers\PersonAttended::class, 'stored']);

  Route::post('/lpaActivities/upload', [App\Http\Controllers\PersonAttended::class, 'storedActivities']);

  Route::middleware(['auth:sanctum'])->post('/lpa/checked', [App\Http\Controllers\PersonAttended::class, 'checked']);

  Route::middleware(['auth:sanctum'])->post('/lpa/process', [App\Http\Controllers\PersonAttended::class, 'process']);

  Route::middleware(['auth:sanctum'])->post('/lpa/refreshMigrations', [App\Http\Controllers\PersonAttended::class, 'refreshMigrations']);

  Route::middleware(['auth:sanctum'])->get('/lpa', [App\Http\Controllers\Meal::class, 'getLpa']);
  Route::middleware(['auth:sanctum'])->get('/lpaPbi', [App\Http\Controllers\Meal::class, 'getLpaPBI']);

  Route::middleware(['auth:sanctum'])->post('/lpaGraficos', [App\Http\Controllers\Meal::class, 'getLpaGraficos']);

  //seguuimiento
  Route::middleware(['auth:sanctum'])->get('/lpaseg', [App\Http\Controllers\Meal::class, 'getLpaSeg']);

  //monitorio post distribucion pda
  Route::middleware(['auth:sanctum'])->get('/mpd', [App\Http\Controllers\Meal::class, 'geMpd']);
  //MIGRACIONS DESDE EL KOBO
  Route::middleware(['auth:sanctum'])->post('/mpd/update', [App\Http\Controllers\MonitorPostDist::class, 'stored']);

  Route::middleware(['auth:sanctum'])->post('/mpd/process', [App\Http\Controllers\MonitorPostDist::class, 'process']);

  Route::middleware(['auth:sanctum'])->post('/mpd/refresh', [App\Http\Controllers\MonitorPostDist::class, 'refresh']); //receptor

  //ALERTAS

  Route::middleware(['auth:sanctum'])->post('/alerta/update', [App\Http\Controllers\Alertas::class, 'stored']);

  Route::middleware(['auth:sanctum'])->post('/alerta/refresh', [App\Http\Controllers\Alertas::class, 'refresh']); //receptor

  Route::middleware(['auth:sanctum'])->get('/alerta', [App\Http\Controllers\Alertas::class, 'all']); //receptor

  //ERN

  Route::middleware(['auth:sanctum'])->post('/ern/update', [App\Http\Controllers\Erns::class, 'stored']);

  Route::middleware(['auth:sanctum'])->post('/ern/refresh', [App\Http\Controllers\Erns::class, 'refresh']); //receptor

  Route::middleware(['auth:sanctum'])->get('/erns', [App\Http\Controllers\Erns::class, 'all']); //receptor

  //monitoreo y evaluacion

  Route::middleware(['auth:sanctum'])->get('/moni_eva/report', [App\Http\Controllers\Monitoreo::class, 'reports']);
  
  Route::get('/moni_eva/report/download/{path}', [App\Http\Controllers\Monitoreo::class, 'reportDownload']);

  //FIN MIGRACIONS DESDE EL KOBO

  //quejas y reclamos
  Route::get('/mqr/download', [App\Http\Controllers\Media::class, 'downloadMediaPqr']);

  Route::post('/mqr/download/path', [App\Http\Controllers\Media::class, 'downloadMediaPqrPath']);  

  Route::post('/mqr/upload', [App\Http\Controllers\PersonComplainted::class, 'stored']);

  Route::middleware(['auth:sanctum'])->get('/mqr', [App\Http\Controllers\Meal::class, 'getMqr']);

  //carga de actividades
  Route::middleware(['auth:sanctum'])->post('/actividades/upload', [App\Http\Controllers\Activity::class, 'stored']);

  Route::middleware(['auth:sanctum'])->get('/actividades', [App\Http\Controllers\Meal::class, 'getActivity']);

  Route::middleware(['auth:sanctum'])->post('/actividades', [App\Http\Controllers\Meal::class, 'setActivity']);

  Route::middleware(['auth:sanctum'])->post('/echo/upload', [App\Http\Controllers\echoController::class, 'stored']);

  Route::middleware(['auth:sanctum'])->post('/bha/upload', [App\Http\Controllers\BhaController::class, 'stored']);
});

Route::prefix('firebird')->group(function (){

  Route::middleware(['auth:sanctum'])->get('/formularios_master', function (Request $request) {

    DB::setDefaultConnection('firebird');
  
    $body = [
      "NOMBRES",
  
      'ID_M_FORMULARIOS',
      //'email',
      //'password',
      "FECHA",
      "FECHA_REGISTRO",
      "ACCION",
      "UNICO",
      "BARCODE",
      "ID_EMPRESA",
      "CAMPO1",
      "CAMPO2",
      "CAMPO3",
      "CAMPO4",
      "CAMPO5",
      "ESTATUS",
      "VIA",
      "TIPO",
      "UID",
      "URL_DATA",
      "URL_CAMPOS",
      /* 
          */
      "COMENTARIOS",
      "GRUPO",
      //relacionales
      "ID_M_CLIENTES",
      "ID_M_USUARIOS",
      "ID_M_AREAS",
    ];
  
    try {
      $results = [];
  
      $results = MFormularios::select($body)
        /*
          ->where(['ID_M_FORMULARIOS'=> '0012'])
           ->foreach($form=>{
  
          }) */
        ->get();
  
      //$results = helper::convert_from_latin1_to_utf8_recursively($results);
      return response()->json(["formularios_master" => json_decode($results)]);
  
      //return $results[0];//mb_convert_encoding($results[0]['NOMBRES'], 'UTF-8', 'UTF-8');
      //return response(["message" => "Model status successfully updated!", "data" =>  json_encode($results->toArray())], 200);
    } catch (\Throwable $exception) {
      return response()->json(['Error' => $exception->getMessage()]);
    }
  });
  
  Route::middleware(['auth:sanctum'])->get('/formularios_kobo_master', function (Request $request) {
  
    //DB::setDefaultConnection('odbc');
    DB::setDefaultConnection('firebird');
  
    return MKoboFormularios::get();
  
    /* $formulario = MKoboFormularios::with(
          ['localidad', 'usuario', 'area', 'master_f']
      );
  
      //return utf8_encode($formulario->get());
      return response()->json(["formularios_kobo_master" => json_decode($formulario->get())]); */
  });
  
  Route::middleware(['auth:sanctum'])->post('/mireusers', function (Request $request) {
  
    try {
  
      DB::setDefaultConnection('firebird');
  
      $body = $request->body ?? [
  
        //"NOMBRES",
        //"APELLIDOS",
        //"NOMBRE_COMPLETO",
        "CORREO",
        "ID_M_USUARIO",
        "LOGIN",
        "CLAVE",
        "FECHA",
        "ACCION",
        "UNICO",
        "ID",
        "ID_EMPRESA",
  
        "HUELLA",
        "SESSION_ID",
        "ESTATUS",
        "IP",
        "CAMPO1",
        "CAMPO2",
        "CAMPO3",
        "CAMPO4",
        "CAMPO5",
        "NIVEL",
        "ROTULO",
        "FECHA_REGISTRO",
        "CODIGO1",
        "CODIGO2",
        "CODIGO3",
  
        "FRASE",
        "FORMULA",
        "FECHA_NAC",
        "CONDICION_SESION",
        "AGENTE_ESTATUS",
        "LLAVE",
        "NAVEGADOR",
  
        //relacionales
        "ID_M_NIVELES",
        "ID_M_VENDEDORES",
        "ID_M_CLIENTES",
        "ID_M_DEPARTAMENTOS",
        "ID_M_USUARIOS",
        "ID_M_AREAS",
        //relacionales
  
        //NO EXISTE
        "ID_M_GRUPOS"
      ];
  
      $m_usuarios = MUsuarios::select($body)->get(); //where("CORREO" , "!=", "testroles@gmail.com")->
  
      return response()->json(["users" => helper::convert_from_latin1_to_utf8_recursively($m_usuarios)]);
    } catch (\Throwable $exception) {
      return response()->json(['Error' => $exception->getMessage()]);
    }
  });
  
  Route::middleware(['auth:sanctum'])->post('/grupos', function (Request $request) {
  
    try {
  
      DB::setDefaultConnection('firebird');
  
      $m_grupos = MGrupos::get(); 
  
      return response()->json(["grupos" => helper::convert_from_latin1_to_utf8_recursively($m_grupos)]);
    } catch (\Throwable $exception) {
      return response()->json(['Error' => $exception->getMessage()]);
    }
  });

  
  Route::middleware(['auth:sanctum'])->post('/lpamigracion', function (Request $request) {
  
    try {
  
      DB::setDefaultConnection('firebird');
  
      $m_grupos = MGrupos::get(); 
  
      return response()->json(["grupos" => helper::convert_from_latin1_to_utf8_recursively($m_grupos)]);
    } catch (\Throwable $exception) {
      return response()->json(['Error' => $exception->getMessage()]);
    }
  });

  
  
  Route::middleware(['auth:sanctum'])->post('/query', function (Request $request) {
  
  /*   try { */
  
      DB::setDefaultConnection('firebird');

      $resultados = DB::select($request->sql); 
  
      return response()->json(["resultados" =>  helper::convert_from_latin1_to_utf8_recursively($resultados) ]);
    /* } catch (\Throwable $exception) {
      return response()->json(['Error' => $exception->getMessage()]);
    } */
  });
});

Route::prefix('mongo')->group(function (){
  
  Route::middleware(['auth:sanctum'])->post('/query', function (Request $request) {
  
    /*   try { */
    
        DB::setDefaultConnection('mongodb');
  
        $resultados = DB::select($request->sql); 
    
        return response()->json(["resultados" =>  helper::convert_from_latin1_to_utf8_recursively($resultados) ]);
      /* } catch (\Throwable $exception) {
        return response()->json(['Error' => $exception->getMessage()]);
      } */
    });
});

Route::middleware((['auth:sanctum']))->prefix('pgsql')->group(function (){

  Route::middleware(['auth:sanctum'])->post('/query', function (Request $request) {
  
    /*   try { */
        $resultados = DB::select($request->sql); 
    
        return response()->json(["resultados" =>  helper::convert_from_latin1_to_utf8_recursively($resultados) ]);
      /* } catch (\Throwable $exception) {
        return response()->json(['Error' => $exception->getMessage()]);
      } */
    });
});


Route::middleware(['auth:sanctum'])->prefix('kobo')->group(function () {
  Route::get('{uui}/export/{token}', function ($uui, $token) {

    //dd($uui, $token);

    //https://kc.acf-e.org/api/v1/forms?id_string=a4E3J9gkULZe5eRqQph8zh
    $jsonurlform = "https://kc.acf-e.org/api/v1/forms?id_string=" . $uui;

    $dataForm = Http::withHeaders([
      'Authorization' => 'Token ' . $token . '',
      'Accept' => '*/*'
    ])
      ->get($jsonurlform)
      ->json();

    $formid = collect($dataForm[0])->get('formid');


    //submissions es lo mismo que data
    //...{_id_formulario}
    //https://kc.acf-e.org/api/v1/data/2486
    $jsonurlData = "https://kf.acf-e.org/assets/" . $uui . "/submissions/?format=json";

    $dataSubmissionsResponse = Http::withHeaders([
      'Authorization' => 'Token ' . $token . '',
      'Accept' => 'application/json'
    ])
      ->get($jsonurlData)
      ->json();

    $dataSubmissionsData = collect($dataSubmissionsResponse);

    //contruccion de json con los datos para generar links de keto temporar para generar html luego ajustar html luego generar pdf

    /* $dataSubmissionsData->each(function (Collection $item) {
            // ...
        }); */

    $dataId = $dataSubmissionsData->first()['_id'];

    //https://kc.kobotoolbox.org/api/v1/data/28058/20/enketo?return_url=url
    //$jsonurlDataEnketo = "https://kc.acf-e.org/api/v1/data/" . $formid . "/" . $dataId . "/enketo?return_url=false";
    $jsonurlDataEnketo = "https://kc.acf-e.org/api/v1/data/" . $formid;

    $dataEnketoResponse = Http::withHeaders([
      'Authorization' => 'Token ' . $token . '',
      'Accept' => 'application/json'
    ])
      ->get($jsonurlDataEnketo)
      ->json();

    $dataEnketo = collect($dataEnketoResponse);

    //$urlHtmlPdf = $dataEnketo->first();

    //return ($urlHtmlPdf);
    //onbtener url de lso iagens https://kc.acf-e.org/api/v1/media/2486

    //imagenes del formulario
    /* $urlMedia = "https://kc.acf-e.org/api/v1/media/";
        
        $dataMediaResponse = Http::withHeaders([
            'Authorization' => 'Token ' . $token . '',
            'Accept' => 'application/json'
        ])
            ->get($urlMedia); */
    //return $dataEnketo;,

    //contruyrndo las imagenes del formulario

    $dataEnketoWithImage = $dataEnketo->map(function ($chield) {
      $formulario = collect($chield); //->forget('name');

      $claves = $formulario->keys();
      $valores =  array_values($chield);
      //!id_object($valor) && 

      for ($i = 0; $i < count($claves); $i++) {
        # code...
        $clave = $claves[$i];
        $valor = $valores[$i];

        if (!is_array($valor) && isset($clave)) {

          if (
            (stripos($valor, '.jpg') !== false && stripos($valor, '.jpg') == (strlen($valor) - strlen('.jpg'))) ||
            (stripos($valor, '.png') !== false && stripos($valor, '.png') == (strlen($valor) - strlen('.png'))) ||
            (stripos($valor, '.jpeg') !== false && stripos($valor, '.png') == (strlen($valor) - strlen('.png'))) ||
            (stripos($valor, '.svg') !== false && stripos($valor, '.png') == (strlen($valor) - strlen('.png')))
          ) {
            $chield_attachments = collect($chield['_attachments']);

            $urlImgFirst = $chield_attachments->filter(function ($atached) use ($valor) {
              return isset($atached['download_url']) && (stripos($atached['download_url'], $valor) !== false);
            });

            $urlImg = collect($urlImgFirst);

            $formulario->$clave = $urlImg->first()['download_url'];
          }
        }
      }

      return $formulario;
    });

    return view('pdf.formulario', ["data" => $dataEnketo->first()]);

      /* $pdf = Pdf::loadView('pdf.formulario', ["data" => $dataEnketo->first()]);
        return $pdf->download('invoice.pdf'); */

      /* [
            "status" => $response->getStatusCode(),
            "data" => $response->body(),
            "json" => $response->json() ,
            "object" => $response->object() ,
            "status" => $response->status() ,
            "successful" => $response->successful() ,
            "clientError" => $response->clientError() ,
            //"mkoboformulario" => $formulario->get()
        ] */;
  });

  Route::get('{id}/exportByid/{token}', [App\Http\Controllers\Kobo::class, 'exportByid']);

  Route::get('{id}/exportByuui/{token}', [App\Http\Controllers\Kobo::class, 'exportByuui']);

  Route::get('{uui}/data/{token}', [App\Http\Controllers\Kobo::class, 'getKoboLabels']);

  Route::get('{uui}/datawithid/{token}', [App\Http\Controllers\Kobo::class, 'getKoboWidthId']);

  Route::post('seach', [App\Http\Controllers\Kobo::class, 'getKoboSaved']);
  
});

//creacion de matriz de palabras clave

Route::middleware(['auth:sanctum'])->post('/matriz/minas', [App\Http\Controllers\MatrizController::class, 'stored']);

Route::middleware(['auth:sanctum'])->post('/matriz', [App\Http\Controllers\MatrizController::class, 'storedMatriz']);

Route::middleware(['auth:sanctum'])->get('/matriz/minas', [App\Http\Controllers\MatrizController::class, 'all']);

Route::middleware(['auth:sanctum'])->get('/matriz/MAPAEI', [App\Http\Controllers\MatrizController::class, 'getMAPAEI']);
Route::middleware(['auth:sanctum'])->get('/matriz/MAPAEICustomDictionary', [App\Http\Controllers\MatrizController::class, 'getMAPAEICustomDictionary']);

Route::get('/matriz/diccionario/download', [App\Http\Controllers\Media::class, 'downloadMediaMatriz']);

// jobs
Route::middleware(['auth:sanctum'])->post('/job/deploy/{id}/{token}', [App\Http\Controllers\Jobs::class, 'exportByuui']);


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', [Auth::class, 'login'])->name('api/login');

//Route::post('register', [Auth::class, 'register']);

Route::post('logout', [Auth::class, 'logout']);

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
  return $request->user();
});

Route::post('/testmd5', function (Request $request) {

  $string = "";

  if ($request->obj == "d") {
    $string = md5($request->text);
  } else {
    $string = md5($request->text);
  }

  return response()->json(["obj" => $request->obj, "data" => $string]);
});

//ejemplo con roles
/* 
Route::get('/orders', function () {
    // Token has the "check-status" or "place-orders" ability...
})->middleware(['auth:sanctum', 'ability:check-status,place-orders']);
*/

//verificacion de roles

/* 
return $request->user()->id === $server->user_id &&
       $request->user()->tokenCan('server:update')
*/

//revocar tokens

/* // Revoke all tokens...
$user->tokens()->delete();
 
// Revoke the token that was used to authenticate the current request...
$request->user()->currentAccessToken()->delete();
 
// Revoke a specific token...
$user->tokens()->where('id', $tokenId)->delete(); */
