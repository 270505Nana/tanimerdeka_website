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

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    /* Tentang Kami*/
    Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('tentang-kami.index');
    Route::post('/tentang-kami', [TentangKamiController::class, 'store'])->name('tentang-kami.store');

    /*Pusat Informasi*/
    Route::get('/pusat-informasi', [PusatInformasiController::class, 'index'])->name('pusat-informasi.index');
    Route::get('/pusat-informasi/create', [PusatInformasiController::class, 'create'])->name('pusat-informasi.create');
    Route::post('/pusat-informasi', [PusatInformasiController::class, 'store'])->name('pusat-informasi.store');
    Route::get('/pusat-informasi/{id}', [PusatInformasiController::class, 'show'])->name('pusat-informasi.show');
    Route::get('/pusat-informasi/{id}/edit', [PusatInformasiController::class, 'edit'])->name('pusat-informasi.edit');
    Route::put('/pusat-informasi/{id}', [PusatInformasiController::class, 'update'])->name('pusat-informasi.update');
    Route::delete('/pusat-informasi/{id}', [PusatInformasiController::class, 'destroy'])->name('pusat-informasi.destroy');


    /*Kabar Berita*/
    Route::get('/kabar-berita', [KabarBeritaController::class,'index'])->name('kabar-berita.index');
    Route::get('/kabar-berita/create', [KabarBeritaController::class,'create'])->name('kabar-berita.create');
    Route::post('/kabar-berita', [KabarBeritaController::class,'store'])->name('kabar-berita.store');
    Route::get('/kabar-berita/{id}', [KabarBeritaController::class,'show'])->name('kabar-berita.show');
    Route::get('/kabar-berita/{id}/edit', [KabarBeritaController::class,'edit'])->name('kabar-berita.edit');
    Route::put('/kabar-berita/{id}', [KabarBeritaController::class,'update'])->name('kabar-berita.update');
    Route::delete('/kabar-berita/{id}', [KabarBeritaController::class,'destroy'])->name('kabar-berita.destroy');
});
