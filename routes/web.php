<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KTAController;
use App\Http\Controllers\JurusanController;

Route::get('/', function () {
    return view('home');
});


Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
Route::get('/kta', [KTAController::class, 'index']);
Route::post('/kta/update/{id}', [KTAController::class, 'update']);
Route::get('/jurusan', [JurusanController::class, 'index']);

Route::get('/kta/download-pdf', [KTAController::class, 'downloadPDF']);
Route::get('/jurusan/download-pdf', [JurusanController::class, 'downloadPDF']);

