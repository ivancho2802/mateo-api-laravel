<?php

use App\Http\Controllers\Emergencias;
use App\Models\Departamentos;
use App\Models\MKoboRespuestas;
use App\Models\MLpaEmergencia;
use App\Models\Municipios;
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
use App\Models\migrateCustom;
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


Route::get('/querytest', function (Request $request) {

  /*   try { */

  return response()->json([
    ["name" => "asd", "code" => "asd1"],
    ["name" => "asd", "code" => "asd2"],
    ["name" => "asd", "code" => "asd2"],
    ["name" => "asd", "code" => "asd2"],
    ["name" => "asd", "code" => "asd2"],
    ["name" => "asd", "code" => "asd2"],
    ["name" => "asd", "code" => "asd2"],
    ["name" => "asd", "code" => "asd2"],
  ]);
  /* } catch (\Throwable $exception) {
    return response()->json(['Error' => $exception->getMessage()]);
  } */
});

//middleware(['auth:sanctum'])->

Route::post('/typeform', function (Request $request) {

  DB::setDefaultConnection('pgsql');

  //dd("request", $request->form_response["answers"]);
  //dd("request", $request->form_response["form_id"]);

  $m_formulario = MFormulario::updateOrCreate(
    ['ID_M_FORMULARIOS' => $request->form_response["form_id"]],
    [
      'ACCION' => "CREER",
      'ID_M_FORMULARIOS' => $request->form_response["form_id"],
      "ASSET_UID" => $request->token,
      "UID" => $request->token,
      "URL_DATA" => "url",
      "URL_CAMPOS" => "url",
      "ESTATUS" => true,
      "FECHA" => Carbon\Carbon::now(),
      "FECHA_REGISTRO" => Carbon\Carbon::now(),
      "ID_M_USUARIOS" => 1
    ]
  );

  $m_formulario = MFormulario::where(["ID_M_FORMULARIOS" => $request->form_response["form_id"]])->first();

  $m_formulario_id = $m_formulario->ID_M_FORMULARIOS;

  if (!isset($m_formulario_id)) {
    return response()->json(['status' => false, 'message' => "error en la creacion del formulario maestro", "data" => $m_formulario], 503);
  }
  //llamo todas las preguntas de este formulario las desactivo

  $creation_failed = [];
  $count = 0;
  $definition = collect($request->form_response["definition"]["fields"]);

  //dd($definition->where('id', $request->form_response["answers"][0]["field"]["id"])->first()["title"]);
  $correo = "";

  for ($i = 0; $i < count($request->form_response["answers"]); $i++) {
    //ojo esto actualiza o crea una
    //$object = (object) helper::formatObject($request->form_response["answers"][$i], "");
    $object = $request->form_response["answers"][$i];

    //crear preguntas

    $id_kobo_respuesta = $object["field"]["id"];

    $body_m_kobo_preguntas = [];
    $body_respuestas = [];
    //respuesta
    //$object->text;
    $pregunta = $definition->where('id', $object["field"]["id"])->first()["title"];
    $respuesta = $object["text"] ?? "N/A";


    $posicion = strpos($pregunta, "Correo");

    if ($posicion !== false) {
      $correo = $respuesta;
    }

    if (!isset($object["text"]) && isset($object["choice"])) {
      $respuesta = $object["choice"]["label"];
    } elseif (!isset($object["text"]) && !isset($object["choice"])) {
      $respuesta = json_encode($object);
    }

    //dd("respuesta", $respuesta);

    array_push(
      $body_m_kobo_preguntas,
      [
        "ID_M_KOBO_FORMULARIOS" => $id_kobo_respuesta,
        "_ID" => $id_kobo_respuesta,
        "CAMPO1" => $pregunta,
        "ID_M_FORMULARIOS" => $m_formulario_id,
        "ESTATUS" => 1,
        "ID_M_USUARIOS" => 1,
        "created_at" => Carbon\Carbon::now(),
      ]
    );

    $m_kobo_preguntas = MKoboFormularios::updateOrCreate(
      ['ID_M_FORMULARIOS' => $m_formulario_id],
      $body_m_kobo_preguntas[0]
    );

    if (!$m_kobo_preguntas) {
      array_push(
        $creation_failed,
        ["preguntas" => $body_m_kobo_preguntas]
      );
    }

    //crear respuesta
    $preguntas_created = MKoboFormularios::where(["_ID" => $id_kobo_respuesta])->first();

    array_push($body_respuestas, [
      "FECHA" => Carbon\Carbon::now(),
      "FECHA_REGISTRO" => Carbon\Carbon::now(),
      "_ID" => $id_kobo_respuesta,
      "REFERENCIA" => $pregunta,
      "VALOR" => $respuesta,
      "ID_M_KOBO_FORMULARIOS" => $preguntas_created->id,
      "ID_M_FORMULARIOS" => $m_formulario_id,
      "ID_M_USUARIOS" => 1,
      "created_at" => Carbon\Carbon::now(),
      "CAMPO1" => $correo
    ]);
    $m_respuestas = MKoboRespuestas::insert($body_respuestas);

    if (!$m_respuestas) {
      array_push(
        $creation_failed,
        ["respuestas" => $body_respuestas] //$body_respuestas
      );
    }

    migrateCustom::create([
      'table' => 'CREER',
      'table_id' => $preguntas_created->id,
      'file_ref' => '-',
    ]);
  }

  if (count($creation_failed) > 0) {
    return response()->json([
      'status' => false,
      'message' => "no se terminaron de cargar los registros ponte en contacto con soporte",
      'data' => $creation_failed
    ], 503);
  }

  return response()->json(['status' => true, 'data' => [count($request->form_response["answers"]), $count]], 200);
  /* } else {
    // Manejar el error de la solicitud
    $msg = 'Error al realizar la solicitud GET: ' . error_get_last()['message'];
    return response()->json(['status' => false, 'message' => $msg], 503);
  } */
});

Route::get('/typeform', [App\Http\Controllers\Media::class, 'mateoAnelicaHps']);

Route::post('/typeformdownload', [App\Http\Controllers\Media::class, 'downloadPdf']);

Route::get('departamentos', function (Request $request) {
  $departamento = Departamentos::all();
  return response()->json($departamento);
});

Route::get('municipios', function (Request $request) {

  $municipios = Municipios::all();

  return response()->json($municipios);
});

Route::get('municipios/{departamento}', function (Request $request) {
  $municipios = [];

  if (isset($request->departamento)) {
    $departamento_finded = Reports::where('departamento', $request->departamento);

    $municipios = $departamento_finded->get()->groupBy('municipio')->keys();
  } else {
    $municipios = Municipios::all();
  }

  return response()->json($municipios);
});
    
Route::middleware((['auth:sanctum']))->prefix('pgsql')->group(function () {

  Route::middleware(['auth:sanctum'])->post('/query', function (Request $request) {

    /*   try { */
    $resultados = DB::select($request->sql);

    return response()->json(["resultados" => helper::convert_from_latin1_to_utf8_recursively($resultados)]);
    /* } catch (\Throwable $exception) {
        return response()->json(['Error' => $exception->getMessage()]);
      } */
  });
});

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
