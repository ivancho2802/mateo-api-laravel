<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\MatrizController;
use App\Http\Controllers\Ugic;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('urls', UrlController::class)
->middleware(['auth']);//, 'verified'

Route::resource('matrizprensa', MatrizController::class)
->middleware(['auth']);//, 'verified'

Route::resource('koboapdf', Ugic::class)
->middleware(['auth']);//, 'verified'

Route::middleware(['auth'])->post('/job/deploy/exportkobo', [App\Http\Controllers\Jobs::class, 'exportByuui']);

// route for get shortener url
Route::get('/cut/{shortener_url}', [UrlController::class, 'shortenLink'])->name('shortener-url');

Route::get('/qr', [QrCodeController::class, 'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/* Route::post('/matriz', function () {
    return view('dashboard');
})->middleware(['auth'])->name('matriz'); */
Route::middleware(['auth'])->get('matriz', [App\Http\Controllers\MatrizController::class, 'getMatriz'])->name('matriz');

Route::middleware(['auth'])->post('matrizprensa', [App\Http\Controllers\MatrizController::class, 'storedMatriz']);

require __DIR__.'/auth.php';
