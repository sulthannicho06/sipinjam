<?php

use App\Http\Controllers\AlatController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo', function () {
    return 'Halo, Sipinjam! Latihan 6 berhasil!';=
});

Route::get('/halo/{nama}', function ($nama) {
    return 'Halo, ' . e($nama) . '!';
});

Route::get('/coba', function () {
    return view('coba');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('alat.index');
    })->name('dashboard');

    Route::resource('alat', AlatController::class);
    Route::resource('buku', BukuController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';