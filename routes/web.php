<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::view('admin/dashboard', 'admin.dashboard')
    ->middleware(['auth', 'verified', 'admin'])
    ->name('admin.dashboard');

Route::view('dashboard', 'peserta.dashboard')
    ->middleware(['auth', 'verified', 'peserta'])
    ->name('peserta.dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
