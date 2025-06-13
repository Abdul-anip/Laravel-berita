<?php
// routes/web.php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\UserBeritaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk user yang sudah login dan terverifikasi
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Route berita untuk user biasa
    Route::get('/berita', [UserBeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/{berita}', [UserBeritaController::class, 'show'])->name('berita.show');
});

// Route untuk admin
Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('berita', BeritaController::class);
});

require __DIR__.'/auth.php';