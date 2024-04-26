<?php

use App\Http\Controllers\BeasiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/beasiswa/daftar', [BeasiswaController::class, 'index'])->name('beasiswa.daftar');
Route::post('/beasiswa/daftar/update', [BeasiswaController::class, 'store'])->name('beasiswa.daftar.store');
Route::get('/beasiswa/daftar/cluster', [BeasiswaController::class, 'index_cluster'])->name('beasiswa.daftar.cluster');
Route::post('/beasiswa/daftar/cluster/update', [BeasiswaController::class, 'store_cluster'])->name('beasiswa.daftar.cluster.store');
Route::get('/beasiswa/daftar/kampus', [BeasiswaController::class, 'index_kampus'])->name('beasiswa.daftar.kampus');
Route::post('/beasiswa/daftar/kampus/update', [BeasiswaController::class, 'store_kampus'])->name('beasiswa.daftar.kampus.store');
Route::get('/beasiswa/daftar/jurusan', [BeasiswaController::class, 'index_jurusan'])->name('beasiswa.daftar.jurusan');
Route::post('/beasiswa/daftar/jurusan/update', [BeasiswaController::class, 'store_jurusan'])->name('beasiswa.daftar.jurusan.store');
