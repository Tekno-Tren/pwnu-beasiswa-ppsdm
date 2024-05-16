<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CetakKartuController;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/cetak-kartu/{id}', [CetakKartuController::class, 'cetakKartu'])->name('cetak-kartu');
