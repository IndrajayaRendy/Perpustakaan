<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PeminjamanController;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk Buku
Route::resource('buku', BukuController::class);
Route::get('buku/{buku}', [BukuController::class, 'show'])->name('buku.show');
Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');



// Route untuk Pelanggan
Route::resource('pelanggan', PelangganController::class);
Route::get('pelanggan/{pelanggan}', [PelangganController::class, 'show'])->name('pelanggan.show');


// Route untuk Peminjaman
Route::resource('peminjaman', PeminjamanController::class);
Route::get('peminjaman/{peminjaman}', [PeminjamanController::class, 'show'])->name('peminjaman.show');
