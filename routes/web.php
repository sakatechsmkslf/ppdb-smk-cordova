<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GelombangController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\PendaftarController;
use App\Models\Gelombang;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('dashboard.index');
})->name('home');

Route::get('/daftar', function () {
    return view('user.index');
})->name('daftar');


// Auth Routes
Route::resource('gelombang', GelombangController::class);
Route::controller(AuthController::class)->group(function () {
    Route::get('viewLogin', 'viewLogin')->name('viewLogin');
    Route::post('login', 'login')->name('login');
    Route::get('viewRegister', 'viewRegister')->name('viewRegister');
    Route::post('register', 'register')->name('register');
});

// Informasi Routes (Public)
Route::prefix('informasi')->name('informasi.')->group(function () {
    // Halaman informasi
    Route::get('/', [InformasiController::class, 'index'])->name('index');

    // Cari data pendaftar - PERBAIKAN: method POST
    Route::post('/', [InformasiController::class, 'cari'])->name('cari');

    // Export bukti pendaftaran
    Route::get('/export/{id}', [InformasiController::class, 'export'])->name('export');

    // Download formulir pendaftaran
    Route::get('/formulir/{id}', [InformasiController::class, 'formulir'])->name('formulir');

    // Print formulir (view only)
    Route::get('/print-formulir/{id}', [InformasiController::class, 'printFormulir'])->name('print.formulir');
});

Route::get('provinces', [App\Http\Controllers\DaerahController::class, 'provinces'])->name('provinces');
Route::get('cities', [App\Http\Controllers\DaerahController::class, 'cities'])->name('cities');
Route::get('districts', [App\Http\Controllers\DaerahController::class, 'districts'])->name('districts');
Route::get('villages', [App\Http\Controllers\DaerahController::class, 'villages'])->name('villages');
Route::resource('pendaftaran', PendaftarController::class);


// Protected Routes (Auth Required)
Route::middleware(['auth'])->group(function () {

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
