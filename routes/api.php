<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\MFormularios;
use App\Models\MKoboFormularios;

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

    return MFormularios::get();
});

Route::get('/formularios_kobo_master', function (Request $request) {

    $formulario = MKoboFormularios::with(
        ['localidad', 'usuario', 'area', 'master_f']
    );

    return $formulario->get();
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
