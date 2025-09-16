<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangGymController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;

// Halaman utama dan form peminjaman yang bisa diakses publik
Route::get('/', [BarangGymController::class, 'welcome'])->name('home');
Route::get('/peminjaman/create/{alat_id}', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');

// Rute yang membutuhkan otentikasi (siapapun yang login)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [BarangGymController::class, 'index'])->name('dashboard');
    Route::resource('alats', BarangGymController::class);

    // Rute untuk pengelolaan peminjaman, diakses oleh siapapun yang login
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::put('/peminjaman/{peminjaman}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
    Route::delete('/peminjaman/{peminjaman}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');

    // Rute untuk profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';