<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\MatrizController;

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

// route for get shortener url
Route::get('/cut/{shortener_url}', [UrlController::class, 'shortenLink'])->name('shortener-url');

Route::get('/qr', [QrCodeController::class, 'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
