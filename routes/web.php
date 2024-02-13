<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashController;
use App\Http\Controllers\Session;
use App\Http\Controllers\UrlController;

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

Route::get('/login', function () {
    return view('login');
})->name('login');

//Route::post('/session', [Session::class, 'store']);

/* 

Route::get('/formularios_maestros', function (Request $request) {
    return $request->user();
}); */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('urls', UrlController::class)
->middleware(['auth']);//, 'verified'

// route for urls
/* Route::middleware(['auth'])->prefix('urls')->group(function () {
    Route::post('/store', [UrlController::class, 'store'])->name('urls.store');
    Route::get('', [UrlController::class, 'index']);
}); */

// route for get shortener url
Route::get('/cut/{shortener_url}', [UrlController::class, 'shortenLink'])->name('shortener-url');

require __DIR__.'/auth.php';
