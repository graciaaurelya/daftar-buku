<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/buku');
Route::resource('buku', BukuController::class);

// Login dan logout
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Wajib login: tambah, ubah, hapus
// (harus di atas route publik agar /buku/create tidak dianggap ID buku)
Route::middleware('auth')->group(function () {
    Route::resource('buku', BukuController::class)->except(['index', 'show']);
});

// Publik: daftar dan detail
Route::resource('buku', BukuController::class)->only(['index', 'show']);
