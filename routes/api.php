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
use App\Models\Reports;
use App\Models\MLpaMongo;
use Jenssegers\Mongodb\MongodbServiceProvider;
//use Jenssegers\Mongodb\MongodbServiceProvider::class,


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

Route::prefix('finanzas')->group(function () {
  //SERVICIO PARA CONSULTAR PARAMETROS DEL POWER BI ADN y1 y2
  Route::get('/adn/fase2', [App\Http\Controllers\Finanzas::class, 'all']);
  Route::post('/adn/fase2', [App\Http\Controllers\Finanzas::class, 'set']);
  Route::get('/adn/loaextra', [App\Http\Controllers\Finanzas::class, 'getLoaExtra']);
  Route::get('/adn/indivhogares', [App\Http\Controllers\Finanzas::class, 'getCuaIndHog']);

});

Route::prefix('meal')->group(function () {

  //lista de personas atendidas
  Route::get('/lpa/download', [App\Http\Controllers\Media::class, 'downloadMedia']);

  //Route::post('/lpa/upload', [App\Http\Controllers\PersonAttended::class, 'stored']);
  Route::post('/lpa/upload', [App\Http\Controllers\PersonAttendedMongo::class, 'stored']);

  //carga de discapacitados
  Route::post('/lpa/discapacitadosFix', [App\Http\Controllers\PersonAttended::class, 'storeFixDiscapacitados']);

  Route::middleware(['auth:sanctum'])->get('/lpa/discapacitadosFix', [App\Http\Controllers\PersonAttended::class, 'fixDiscapacitados']);

  Route::post('/lpaActivities/upload', [App\Http\Controllers\PersonAttended::class, 'storedActivities']);

  Route::middleware(['auth:sanctum'])->post('/lpa/checked', [App\Http\Controllers\PersonAttended::class, 'checked']);

  Route::middleware(['auth:sanctum'])->post('/lpa/process', [App\Http\Controllers\PersonAttended::class, 'process']);

  Route::middleware(['auth:sanctum'])->post('/lpa/refreshMigrations', [App\Http\Controllers\PersonAttended::class, 'refreshMigrations']);

  Route::middleware(['auth:sanctum'])->get('/lpa', [App\Http\Controllers\Meal::class, 'getLpa']);
  Route::middleware(['auth:sanctum'])->get('/lpaPbi/{from}/{to}', [App\Http\Controllers\Meal::class, 'getLpaPBI']);
  Route::middleware(['auth:sanctum'])->get('/lpaPbi', [App\Http\Controllers\Meal::class, 'getLpaPBI']);
  Route::middleware(['auth:sanctum'])->get('/lpaPbi/filters', [App\Http\Controllers\Meal::class, 'getLpaPBIFilters']);

  Route::middleware(['auth:sanctum'])->post('/lpaGraficos', [App\Http\Controllers\Meal::class, 'getLpaGraficos']);

  //seguuimiento
  Route::middleware(['auth:sanctum'])->get('/lpaseg', [App\Http\Controllers\Meal::class, 'getLpaSeg']);

  //usada en el power bi
  Route::middleware(['auth:sanctum'])->get('/lpasegOnly', [App\Http\Controllers\Meal::class, 'getLpaOnly']);
  Route::middleware(['auth:sanctum'])->get('/lpasegOnlyCount', [App\Http\Controllers\Meal::class, 'lpasegOnlyCount']);

  //lpa para emergencias
  Route::middleware(['auth:sanctum'])->get('/lpa/onlyEmergencias', [App\Http\Controllers\Emergencias::class, 'getEmergencias']);
  //lpa para emergencias
  Route::middleware(['auth:sanctum'])->get('/lpa/onlyActividad', [App\Http\Controllers\Activity::class, 'getActividades']);
  //lpa para personas
  Route::middleware(['auth:sanctum'])->get('/lpa/onlypersonas', [App\Http\Controllers\PersonAttended::class, 'getPersonas']);
  Route::middleware(['auth:sanctum'])->get('/lpa/persona/discapacitadoRt', [App\Http\Controllers\PersonAttended::class, 'getPersonaValidDiscapacidad']);
  Route::middleware(['auth:sanctum'])->get('/lpa/persona', [App\Http\Controllers\PersonAttended::class, 'getPersonaByID']);

  Route::middleware(['auth:sanctum'])->get('/lpasegOnlyPage', [App\Http\Controllers\Meal::class, 'getLpaOnlyPage']);

  Route::middleware(['auth:sanctum'])->get('/lpa/emergencia', [App\Http\Controllers\Emergencias::class, 'getEmergenciaByCod']);
  Route::middleware(['auth:sanctum'])->get('/lpa/actividad', [App\Http\Controllers\Activity::class, 'getActividadByCod']);
  Route::middleware(['auth:sanctum'])->get('/lpa/rangoetareobha', [App\Http\Controllers\PersonAttended::class, 'getRangeBha']);
  Route::middleware(['auth:sanctum'])->get('/lpa/rangoetareoecho', [App\Http\Controllers\PersonAttended::class, 'getRangeEcho']);
  Route::middleware(['auth:sanctum'])->get('/lpa/tipo', [App\Http\Controllers\PersonAttended::class, 'getTipoLpa']);
  Route::middleware(['auth:sanctum'])->get('/lpa/donante', [App\Http\Controllers\PersonAttended::class, 'getDonante']);

  Route::get('/lpa/consorcio', [App\Http\Controllers\PersonAttended::class, 'dataLpaConsorcio']);

  Route::middleware(['auth:sanctum'])->get('/lpadiscapacitados', [App\Http\Controllers\Meal::class, 'getLpaPBIDiscapacidades']);

  //monitorio post distribucion pda
  Route::middleware(['auth:sanctum'])->get('/mpd', [App\Http\Controllers\Meal::class, 'geMpd']);
  //MIGRACIONS DESDE EL KOBO
  Route::middleware(['auth:sanctum'])->post('/mpd/update', [App\Http\Controllers\MonitorPostDist::class, 'stored']);

  Route::middleware(['auth:sanctum'])->post('/mpd/process', [App\Http\Controllers\MonitorPostDist::class, 'process']);

  Route::middleware(['auth:sanctum'])->post('/mpd/refresh', [App\Http\Controllers\MonitorPostDist::class, 'refresh']); //receptor

  //MIGRACION DE IVON MEAL REGIONAL
  Route::middleware(['auth:sanctum'])->post('/mpd/update', [App\Http\Controllers\MonitorPostDist::class, 'stored']);

  //ALERTAS

  Route::middleware(['auth:sanctum'])->post('/alerta/update', [App\Http\Controllers\Alertas::class, 'stored']);

  Route::middleware(['auth:sanctum'])->post('/alerta/refresh', [App\Http\Controllers\Alertas::class, 'refresh']); //receptor

  Route::middleware(['auth:sanctum'])->get('/alerta', [App\Http\Controllers\Alertas::class, 'all']); //receptor

  //ERN

  Route::middleware(['auth:sanctum'])->post('/ern/update', [App\Http\Controllers\Erns::class, 'stored']);

  Route::middleware(['auth:sanctum'])->post('/ern/refresh', [App\Http\Controllers\Erns::class, 'refresh']); //receptor

  //firebird
  Route::middleware(['auth:sanctum'])->get('/erns', [App\Http\Controllers\Erns::class, 'all']);


  //seguimiento de emergencias
  Route::middleware(['auth:sanctum'])->get('/alertasFirebird', [App\Http\Controllers\Alertas::class, 'allFirebird']);

  Route::middleware(['auth:sanctum'])->get('/alertasFirebirdNumFamiHogares', [App\Http\Controllers\Alertas::class, 'allFirebirdNumFamiHogares']);

  Route::middleware(['auth:sanctum'])->get('/alertasSectores', [App\Http\Controllers\Alertas::class, 'allAlertasSectores']);

  Route::middleware(['auth:sanctum'])->get('/fuente', [App\Http\Controllers\Emergencias::class, 'fuente']);

  Route::middleware(['auth:sanctum'])->get('/ruralurbano', [App\Http\Controllers\Emergencias::class, 'ruralurbano']);

  Route::middleware(['auth:sanctum'])->get('/crucesector', [App\Http\Controllers\Emergencias::class, 'crucesector']);

  Route::middleware(['auth:sanctum'])->get('/fce', [App\Http\Controllers\Emergencias::class, 'fce']);

  //monitoreo y evaluacion

  Route::middleware(['auth:sanctum'])->get('/moni_eva/report', [App\Http\Controllers\Monitoreo::class, 'reports']);

  Route::get('/moni_eva/report/download/{path}', [App\Http\Controllers\Monitoreo::class, 'reportDownload']);

  //https://mireview.api.ach.dyndns.info/api/meal/analisis_departamenta/download/02_Situacion Humanitaria por conflicto armado.pdf
  Route::get('/analisis_departamenta/download/{path}', [App\Http\Controllers\Monitoreo::class, 'reportDownloadAnalisis']);

  //FIN MIGRACIONS DESDE EL KOBO

  //quejas y reclamos
  Route::get('/mqr/download', [App\Http\Controllers\Media::class, 'downloadMediaPqr']);

  Route::post('/mqr/download/path', [App\Http\Controllers\Media::class, 'downloadMediaPqrPath']);

  Route::post('/mqr/upload', [App\Http\Controllers\PersonComplainted::class, 'stored']);

  Route::middleware(['auth:sanctum'])->get('/mqr', [App\Http\Controllers\Meal::class, 'getMqr']);

  Route::middleware(['auth:sanctum'])->get('/mqrspaces', [App\Http\Controllers\Meal::class, 'getMqrSpaces']);

  Route::middleware(['auth:sanctum'])->get('/mqrscaminos', [App\Http\Controllers\Meal::class, 'getMqrCaminos']);

  //carga de actividades
  Route::middleware(['auth:sanctum'])->post('/actividades/upload', [App\Http\Controllers\Activity::class, 'stored']);

  Route::middleware(['auth:sanctum'])->get('/actividades', [App\Http\Controllers\Meal::class, 'getActivity']);

  Route::middleware(['auth:sanctum'])->post('/actividades', [App\Http\Controllers\Meal::class, 'setActivity']);

  Route::middleware(['auth:sanctum'])->post('/echo/upload', [App\Http\Controllers\echoController::class, 'stored']);

  Route::middleware(['auth:sanctum'])->post('/bha/upload', [App\Http\Controllers\BhaController::class, 'stored']);

  //respuesta rapida
  Route::middleware(['auth:sanctum'])->get('/rr/report', [App\Http\Controllers\Meal::class, 'getRrProdsReport']);

  Route::get('/rr/report/departamentos', function (Request $request) {

    $departamentos = Reports::all()->groupBy('departamento')->keys();
    
    return response()->json($departamentos);
  });

  Route::get('/rr/report/municipios', function (Request $request) {

    $municipios = Reports::all()->groupBy('municipio')->keys();

    return response()->json($municipios);
  });

  Route::get('/rr/report/municipios/{departamento}', function (Request $request) {

    if(isset($request->departamento)){
      $departamento_finded = Reports::where('departamento', $request->departamento);
      //dd($departamento_finded->get());

      $municipios =  $departamento_finded->get()->groupBy('municipio')->keys();
    }else{
      $municipios = Reports::all()->groupBy('municipio')->keys();

    }

    return response()->json($municipios);
  });

  Route::middleware(['auth:sanctum'])->post('/rr/upload', [App\Http\Controllers\ReportController::class, 'stored']);

  //middleware(['auth:sanctum'])->
  Route::post('/rr/prod_info/upload', [App\Http\Controllers\Meal::class, 'uploadProdinfo']);

  Route::get('/rr/prod_info/download', [App\Http\Controllers\Media::class, 'downloadMediaProdinfo']);

  Route::get('/prod_info/exportdownload', [App\Http\Controllers\Meal::class, 'exportReportsProdInfo']);


});

Route::prefix('firebird')->group(function () {

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

  Route::middleware(['auth:sanctum'])->get('/contactos', function (Request $request) {

    try {

      DB::setDefaultConnection('firebird');

      $resultados = DB::select("SELECT * FROM V_D_CONTACTOS_2");
  
      return response()->json(["resultados" =>  helper::convert_from_latin1_to_utf8_recursively($resultados)]);
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

    return response()->json(["resultados" =>  helper::convert_from_latin1_to_utf8_recursively($resultados)]);
    /* } catch (\Throwable $exception) {
      return response()->json(['Error' => $exception->getMessage()]);
    } */
  });
});

Route::prefix('firebirdcopy')->group(function () {

  Route::middleware(['auth:sanctum'])->get('/formularios_master', function (Request $request) {

    DB::setDefaultConnection('firebirdcopy');

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
    DB::setDefaultConnection('firebirdcopy');

    return MKoboFormularios::get();

    /* $formulario = MKoboFormularios::with(
          ['localidad', 'usuario', 'area', 'master_f']
      );
  
      //return utf8_encode($formulario->get());
      return response()->json(["formularios_kobo_master" => json_decode($formulario->get())]); */
  });

  Route::middleware(['auth:sanctum'])->post('/mireusers', function (Request $request) {

    try {

      DB::setDefaultConnection('firebirdcopy');

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

      DB::setDefaultConnection('firebirdcopy');

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

    DB::setDefaultConnection('firebirdcopy');

    $resultados = collect(DB::select($request->sql));

    DB::setDefaultConnection('firebird');
    $resultados_danados = collect(DB::select($request->sql));

    /* return response()->json([
      "resultados" =>  helper::convert_from_latin1_to_utf8_recursively($resultados),
      "resultados_danados" =>  helper::convert_from_latin1_to_utf8_recursively($resultados_danados),
    ]); */

    $resultados->each(function ( $m_formulario, int $key) use ($resultados_danados){
        // ...
        $resultados_danados->each(function ( $m_formulario_danados, int $key_danado) use($m_formulario){
            // ...
            if($m_formulario_danados->ID_M_FORMULARIOS == $m_formulario->ID_M_FORMULARIOS ){
              DB::setDefaultConnection('firebird');

              DB::select("UPDATE M_FORMULARIOS SET UID='".$m_formulario->UID."', URL_DATA='".$m_formulario->URL_DATA."', URL_CAMPOS='".$m_formulario->URL_CAMPOS."' WHERE ID_M_FORMULARIOS = '".$m_formulario->ID_M_FORMULARIOS."' ");

            }
    
        });

    });

    return response()->json(["resultados" =>  helper::convert_from_latin1_to_utf8_recursively($resultados)]);
    /* } catch (\Throwable $exception) {
      return response()->json(['Error' => $exception->getMessage()]);
    } */
  });
});

Route::prefix('mongo')->group(function () {

  Route::middleware(['auth:sanctum'])->post('/query', function (Request $request) {

    /*   try { */

    DB::setDefaultConnection('mongodb');

    $formluario = new MLpaMongo();

    $formluario->id = "1";
    $formluario->_ID = "1";
    $formluario->ID_M_USUARIOS = "1";
    $formluario->ID_M_FORMULARIOS = "1";
    $formluario->ESTATUS = "1";

    $formluario->save();

    $resultados = MLpaMongo::all();

    //
    $cliente = MongodbServiceProvider::class;
    
    /* $queryRandom = DB::setDefaultConnection('mongodb')->collection($request->collection)//'movies'
    ->where($request->where, $request->wherevalue)//'imdb.rating' 9.3 
    ->get(); */

    return response()->json([
      //"res" => $queryRandom,
      "resultados" =>  helper::convert_from_latin1_to_utf8_recursively($resultados)
    ]);
    /* } catch (\Throwable $exception) {
        return response()->json(['Error' => $exception->getMessage()]);
      } */
  });

  Route::post('/lpa/upload', [App\Http\Controllers\PersonAttendedMongo::class, 'stored']);

  Route::middleware(['auth:sanctum'])->post('/lpa/checked', [App\Http\Controllers\PersonAttendedMongo::class, 'checked']);
  
  Route::middleware(['auth:sanctum'])->post('/lpa/process', [App\Http\Controllers\PersonAttendedMongo::class, 'process']);

  Route::middleware(['auth:sanctum'])->post('/lpa/refreshMigrations', [App\Http\Controllers\PersonAttendedMongo::class, 'refreshMigrations']);

  Route::middleware(['auth:sanctum'])->get('/lpasegOnly', [App\Http\Controllers\MealMongo::class, 'getLpaOnly']);
  Route::middleware(['auth:sanctum'])->get('/lpasegOnlyCount', [App\Http\Controllers\MealMongo::class, 'getLpaOnlyCount']);

  Route::middleware(['auth:sanctum'])->delete('/lpa', [App\Http\Controllers\PersonAttendedMongo::class, 'delete']); //receptor

  // este solicitud crea tantos trabajos para hacer solicitudes a la funcion que hace refresh tantas veces como sea neceasatio de forma asyncrona o en paralelo a las respuestas
  Route::middleware(['auth:sanctum'])->get('/lpa/repairJobsCreateRefresh', [App\Http\Controllers\PersonAttendedMongo::class, 'repairJobsCreateRefresh']);

  Route::middleware(['auth:sanctum'])->get('/lpa/emergencia', [App\Http\Controllers\EmergenciasMongo::class, 'getEmergenciaByCod']);
  Route::middleware(['auth:sanctum'])->get('/lpa/actividad', [App\Http\Controllers\ActivityMongo::class, 'getActividadByCod']);
  Route::middleware(['auth:sanctum'])->get('/lpa/persona', [App\Http\Controllers\PersonAttendedMongo::class, 'getPersonaByID']);

  Route::middleware(['auth:sanctum'])->get('/lpa/rangoetareobha', [App\Http\Controllers\PersonAttended::class, 'getRangeBha']);
  Route::middleware(['auth:sanctum'])->get('/lpa/rangoetareoecho', [App\Http\Controllers\PersonAttended::class, 'getRangeEcho']);
  Route::middleware(['auth:sanctum'])->get('/lpa/tipo', [App\Http\Controllers\PersonAttendedMongo::class, 'getTipoLpa']);
  Route::middleware(['auth:sanctum'])->get('/lpa/donante', [App\Http\Controllers\PersonAttendedMongo::class, 'getDonante']);

  Route::middleware(['auth:sanctum'])->get('/emergencia', [App\Http\Controllers\EmergenciasMongo::class, 'getEmergenciaS']);

});

Route::middleware((['auth:sanctum']))->prefix('pgsql')->group(function () {

  Route::middleware(['auth:sanctum'])->post('/query', function (Request $request) {

    /*   try { */
    $resultados = DB::select($request->sql);

    return response()->json(["resultados" =>  helper::convert_from_latin1_to_utf8_recursively($resultados)]);
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

  Route::put('{uui}/updatekobomireview/{token}', [App\Http\Controllers\Kobo::class, 'puKoboMireView']);

  Route::get('{uui}/exportTemplate/{token}', [App\Http\Controllers\Kobo::class, 'exportTemplateByid']);
});



//creacion de matriz de palabras clave

Route::middleware(['auth:sanctum'])->post('/matriz/minas', [App\Http\Controllers\MatrizController::class, 'stored']);

Route::middleware(['auth:sanctum'])->post('/matriz/{origin}', [App\Http\Controllers\MatrizController::class, 'storedMatriz']);

Route::middleware(['auth:sanctum'])->get('/matriz/minas', [App\Http\Controllers\MatrizController::class, 'all']);

Route::middleware(['auth:sanctum'])->get('/matriz/MAPAEI', [App\Http\Controllers\MatrizController::class, 'getMAPAEI']);

Route::middleware(['auth:sanctum'])->get('/matriz', [App\Http\Controllers\MatrizController::class, 'getMatriz']);

Route::middleware(['auth:sanctum'])->get('/matriz/{tipo}', [App\Http\Controllers\MatrizController::class, 'getMatriz']);

Route::middleware(['auth:sanctum'])->get('/matriz/MAPAEICustomDictionary', [App\Http\Controllers\MatrizController::class, 'getMAPAEICustomDictionary']);

Route::middleware(['auth:sanctum'])->get('/matriz/customDictionary', [App\Http\Controllers\MatrizController::class, 'getMAPAEICustomDictionary']);

Route::middleware(['auth:sanctum'])->get('/matriz/customDictionary/{tipo}', [App\Http\Controllers\MatrizController::class, 'getMAPAEICustomDictionary']);

Route::get('/matriz/diccionario/download', [App\Http\Controllers\Media::class, 'downloadMediaMatriz']);

// jobs
Route::middleware(['auth:sanctum'])->post('/job/deploy/{id}/{token}', [App\Http\Controllers\Jobs::class, 'exportByuui']);
Route::middleware(['auth:sanctum'])->post('/job/deploy/exportkobo', [App\Http\Controllers\Jobs::class, 'exportByuui']);
Route::middleware(['auth:sanctum'])->get('/job/deploy/exportkobo', [App\Http\Controllers\Jobs::class, 'getProccessExport']);



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
