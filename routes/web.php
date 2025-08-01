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

Route::get('/', [App\Http\Controllers\Media::class, 'mateoAnelicaHps']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('urls', UrlController::class)
    ->middleware(['auth']); //, 'verified'

Route::resource('matrizprensa', MatrizController::class)
    ->middleware(['auth']); //, 'verified'

Route::get('/koboapdf', [Ugic::class, 'index'])
    ->middleware(['auth'])->name('koboapdf');

Route::middleware(['auth'])->post('/job/deploy/exportkobo', [App\Http\Controllers\Jobs::class, 'exportByuui']);

//este el search
Route::middleware(['auth'])->post('/koboapdf', [App\Http\Controllers\Jobs::class, 'getProccessExportView']);

Route::middleware(['auth'])->put('/koboapdf', [App\Http\Controllers\Jobs::class, 'addFilterProcessExportView']);

Route::middleware(['auth'])->get('/koboapdfrepair', [\App\Http\Controllers\Jobs::class, 'repair']);

// route for get shortener url
Route::get('/cut/{shortener_url}', [UrlController::class, 'shortenLink'])->name('shortener-url');

Route::get('/qr', [QrCodeController::class, 'show'])->name('qr');

//download files public

Route::middleware(['auth'])->post('/public/{filename}', [App\Http\Controllers\Media::class, 'downloadMediaCustom']);
Route::middleware(['auth'])->get('/public/{filename}', [App\Http\Controllers\Media::class, 'downloadMediaCustom']);
Route::get('/public/download/{filename}', [App\Http\Controllers\Media::class, 'downloadMediaCustom']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/* Route::post('/matriz', function () {
    return view('dashboard');
})->middleware(['auth'])->name('matriz'); */
Route::middleware(['auth'])->get('matriz', [App\Http\Controllers\MatrizController::class, 'getMatriz'])->name('matriz');

Route::middleware(['auth'])->post('matrizprensa', [App\Http\Controllers\MatrizController::class, 'storedMatriz']);


Route::prefix('kobo2')->group(function () {
    Route::get('{uui}/exportTemplate/{token}', [App\Http\Controllers\Kobo::class, 'exportTemplateByid']);
});

Route::prefix('finanzas')->group(function () {
    Route::get('adn', [App\Http\Controllers\Finanzas::class, 'index']);
    Route::post('adn', [App\Http\Controllers\Finanzas::class, 'set']);
    Route::get('adn/json', [App\Http\Controllers\Finanzas::class, 'all']);
});

//links para externaliza

Route::get('desnutricion-infantil-en-la-guajira', function () {
    return redirect()->away("https://arcg.is/1WPX9q");
});


Route::get('constant_companion', function () {
    return view('constant_companion');
});

Route::get('/public/download/{folder}/{filename}', [App\Http\Controllers\Media::class, 'downloadMediaCustomFolder']);

require __DIR__ . '/auth.php';
