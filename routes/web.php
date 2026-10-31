<?php

use App\Http\Controllers\PrediksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home'))->name('home');
Route::get('/tentang', fn () => view('tentang'))->name('tentang');

Route::get('/prediksi', [PrediksiController::class, 'form'])->name('prediksi');
Route::post('/hasil-prediksi', [PrediksiController::class, 'prosesData'])->name('hasil-prediksi');
// Membuka /hasil-prediksi langsung (GET) diarahkan kembali ke form agar tidak error 405.
Route::get('/hasil-prediksi', fn () => redirect()->route('prediksi'));

Route::get('/riwayat', [PrediksiController::class, 'riwayat'])->name('riwayat');
