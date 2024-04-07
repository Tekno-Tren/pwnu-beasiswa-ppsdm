<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrasi\KampusController;

Route::view('/', 'welcome')->name('welcome');

// Group Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified', 'admin']], function () {
    Route::view('dashboard', 'admin.dashboard')->name('admin.dashboard');
    Route::get('administrasi/kampus', [KampusController::class, 'index'])->name('admin.administrasi.kampus.index');
    Route::get('administrasi/kampus/create', [KampusController::class, 'create'])->name('admin.administrasi.kampus.create');
    Route::get('administrasi/kampus/{id}', [KampusController::class, 'show'])->name('admin.administrasi.kampus.show');
});

Route::view('dashboard', 'peserta.dashboard')
    ->middleware(['auth', 'verified', 'peserta'])
    ->name('peserta.dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
