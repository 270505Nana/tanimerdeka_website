<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\KabarBeritaController;
use App\Http\Controllers\PusatInformasiController;

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->name('dashboard');


    /*
    |---------------------------------
    | Tentang Kami
    |---------------------------------
    */

    Route::get('/tentang-kami', [TentangKamiController::class, 'index'])
        ->name('tentang-kami.index');

    Route::post('/tentang-kami', [TentangKamiController::class, 'store'])
        ->name('tentang-kami.store');


    /*
    |---------------------------------
    | Pusat Informasi
    |---------------------------------
    */

    Route::get('/pusat-informasi', [PusatInformasiController::class, 'index'])
        ->name('pusat-informasi.index');


    /*
    |---------------------------------
    | Kabar Berita CRUD
    |---------------------------------
    */

    Route::get('/kabarberita', [KabarBeritaController::class,'index'])->name('kabarberita.index');

    Route::get('/kabarberita/create', [KabarBeritaController::class,'create'])->name('kabarberita.create');

    Route::post('/kabarberita', [KabarBeritaController::class,'store'])->name('kabarberita.store');

    Route::get('/kabarberita/{id}', [KabarBeritaController::class,'show'])->name('kabarberita.show');

    Route::get('/kabarberita/{id}/edit', [KabarBeritaController::class,'edit'])->name('kabarberita.edit');

    Route::put('/kabarberita/{id}', [KabarBeritaController::class,'update'])->name('kabarberita.update');

    Route::delete('/kabarberita/{id}', [KabarBeritaController::class,'destroy'])->name('kabarberita.destroy');
});
