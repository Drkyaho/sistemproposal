<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KTAController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LoginController;

Route::get('/', action: function () {
    return redirect()->route('login');
});

# =======================================================================================
# ===== AUTH =====
# =======================================================================================
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
# =======================================================================================

# =======================================================================================
# ===== KTA =====
# =======================================================================================
Route::middleware(['role:KTA'])->group(function () {
    Route::get('/kta', [KTAController::class, 'index'])->name('kta.index');
    Route::post('/kta/update/{id}', [KTAController::class, 'update']);
    Route::get('/kta/download-pdf', [KTAController::class, 'downloadPDF']);
    Route::delete('/kta/delete/{id}', [KTAController::class, 'delete']);
});
# =======================================================================================

# =======================================================================================
# ===== Admin Jurusan =====
# =======================================================================================
Route::middleware(['role:Admin Jurusan'])->group(function () {
    Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
    Route::get('/jurusan/download-pdf', [JurusanController::class, 'downloadPDF']);
});
# =======================================================================================

# =======================================================================================
# ===== Mahasiswa =====
# =======================================================================================
Route::middleware(['role:Mahasiswa'])->group(function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
});

# =======================================================================================
