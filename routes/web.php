<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelompokTaniController;
use App\Http\Middleware\CheckRole;

Route::middleware('guest')->group(function () {
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