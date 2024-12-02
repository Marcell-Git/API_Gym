<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlatGymController;
use App\Http\Controllers\DataPemesananController;
use App\Http\Controllers\KelasOlahragaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PersonalTrainerController;
use App\Http\Controllers\RiwayatPemesananController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('alat-gym', AlatGymController::class);
Route::resource('data-pemesanan', DataPemesananController::class);
Route::resource('kelas-olahraga', KelasOlahragaController::class);
Route::resource('pembayaran', PembayaranController::class);
Route::resource('pengguna', PenggunaController::class);
Route::resource('personal-trainer', PersonalTrainerController::class);
Route::resource('riwayat-pemesanan', RiwayatPemesananController::class);