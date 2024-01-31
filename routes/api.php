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
use App\Models\MUsuarios;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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

Route::middleware(['auth:sanctum'])->get('/formularios_master', function (Request $request) {

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

    DB::setDefaultConnection('firebird');

    $formulario = MKoboFormularios::with(
        ['localidad', 'usuario', 'area', 'master_f']
    );

    //return utf8_encode($formulario->get());
    return response()->json(["formularios_kobo_master" => json_decode($formulario->get())]);
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


Route::prefix('meal')->group(function () {

    //lista de personas atendidas
    Route::get('/lpa/download', [App\Http\Controllers\Media::class, 'downloadMedia']);

    Route::post('/lpa/upload', [App\Http\Controllers\PersonAttended::class, 'stored']);

    Route::get('/lpa', [App\Http\Controllers\Meal::class, 'getLpa']);

    //monitorio post distribucion pda
    Route::get('/mpd', [App\Http\Controllers\Meal::class, 'geMpd']);
    //MIGRACIONS DESDE EL KOBO
    Route::post('/mpd/update', [App\Http\Controllers\MonitorPostDist::class, 'stored']);


    //quejas y reclamos
    Route::get('/mqr/download', [App\Http\Controllers\Media::class, 'downloadMediaPqr']);

    Route::post('/mqr/upload', [App\Http\Controllers\PersonComplainted::class, 'stored']);

    Route::get('/mqr', [App\Http\Controllers\Meal::class, 'getMqr']);
});


Route::middleware(['auth:sanctum'])->prefix('kobo')->group(function () {
    Route::get('{uui}', function ($uui) {

        $jsonurl = "https://kf.acf-e.org/assets/" . $uui . "/submissions/?format=json";

        /* $response = Http::accept('application/json')
            ->withBasicAuth('ugi', 'ugiach')//ugi@co.acfspain.org | ugi
            ->get($jsonurl); */

        $response = Http::withHeaders([
            'Authorization' => 'Token 322f65e3677ee93aa36d34c9a89e70e66fa9bdd4',
            'Accept' => 'application/json'
        ])
            ->get($jsonurl);


        /*
        dd($response->getHeaderLine('content-type'));
        */

        return $response->json()
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
Route::post('login', [Auth::class, 'login']);

//Route::post('register', [Auth::class, 'register']);

Route::post('logout', [Auth::class, 'logout']);

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/testmd5', function(Request $request){

    $string = "";

    if($request->obj == "d"){
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
