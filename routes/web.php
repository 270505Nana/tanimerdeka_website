<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelompokTaniController;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\KabarBeritaController;
use App\Http\Controllers\PusatInformasiController;

Route::middleware('guest')->group(function () {
    Route::get('/',[AuthController::class,'Beranda'])->name('beranda');
    Route::get('/login', [AuthController::class, 'LoginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'LoginProcess']);
    Route::get('/daftar/anggota', [AuthController::class, 'RegisterPage'])->name('daftar.anggota');
    Route::post('/daftar/anggota', [AuthController::class, 'RegisterProcess'])->name('daftar.anggota.process');
    Route::get('/daftar/anggota/tambah-kelompok', [KelompokTaniController::class, 'AddKelompok'])->name('daftar.anggota.tambah-kelompok');
    Route::post('/daftar/anggota/tambah-kelompok', [KelompokTaniController::class, 'AddKelompokProcess'])->name('daftar.anggota.tambah-kelompok.process');
});

Route::middleware(['auth', CheckRole::class.':anggota,user'])->group(function () {
    Route::post('/logout', [AuthController::class, 'Logout'])->name('logout');
    
    Route::get('/dashboard', function () {
        return view('dashboard'); //dashboard user dan anggota
    })->name('dashboard');
});

Route::middleware(['auth', CheckRole::class.':admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard'); //dashboard admin
    });
});

Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->name('dashboard');

    Route::get('/tentang-kami', [TentangKamiController::class, 'index'])
        ->name('tentang-kami.index');

    Route::post('/tentang-kami', [TentangKamiController::class, 'store'])
        ->name('tentang-kami.store');

    Route::get('/pusat-informasi', [PusatInformasiController::class, 'index'])
        ->name('pusat-informasi.index');

    Route::get('/kabarberita', [KabarBeritaController::class,'index'])->name('kabarberita.index');

    Route::get('/kabarberita/create', [KabarBeritaController::class,'create'])->name('kabarberita.create');

    Route::post('/kabarberita', [KabarBeritaController::class,'store'])->name('kabarberita.store');

    Route::get('/kabarberita/{id}', [KabarBeritaController::class,'show'])->name('kabarberita.show');

    Route::get('/kabarberita/{id}/edit', [KabarBeritaController::class,'edit'])->name('kabarberita.edit');

    Route::put('/kabarberita/{id}', [KabarBeritaController::class,'update'])->name('kabarberita.update');

    Route::delete('/kabarberita/{id}', [KabarBeritaController::class,'destroy'])->name('kabarberita.destroy');
});
