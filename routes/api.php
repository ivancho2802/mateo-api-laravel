<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\MFormularios;
use App\Models\MKoboFormularios;
use App\Models\DContactos;
use App\Http\Controllers\helper;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
//use Excel;
use App\Http\Controllers\PaImportClass;


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

Route::get('/formularios_master', function (Request $request) {

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
        "ID",
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
        return $results;
        //return $results[0];//mb_convert_encoding($results[0]['NOMBRES'], 'UTF-8', 'UTF-8');
        //return response(["message" => "Model status successfully updated!", "data" =>  json_encode($results->toArray())], 200);
    } catch (\Throwable $exception) {
        return response()->json(['Error' => $exception->getMessage()]);
    }
});

Route::get('/formularios_kobo_master', function (Request $request) {

    $formulario = MKoboFormularios::with(
        ['localidad', 'usuario', 'area', 'master_f']
    );

    return $formulario->get();
});

Route::post('/contactostest', function (Request $request) {
    return new DContactos([
        'ID_D_CONTACTOS' => $request->ID_D_CONTACTOS,
        'ID_M_USUARIOS' => $request->ID_M_USUARIOS,
        // Add more columns as needed
    ]);
    
    $Contact = new DContactos;
 
    $Contact->ID_D_CONTACTOS = $request->ID_D_CONTACTOS;
    $Contact->ID_M_USUARIOS = $request->ID_M_USUARIOS;
    
    $Contact->save();

    return $Contact->get();
});


Route::prefix('meal')->group(function () {

    Route::get('/lpa/download', [App\Http\Controllers\Media::class, 'downloadMedia']);

    Route::post('/lpa/upload', [App\Http\Controllers\PersonAttended::class, 'stored']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:api')->prefix('kobo')->group(function () {
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
