<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GelombangController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\PendaftarController;
use App\Models\Gelombang;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('user.index');
// })->name('daftar');

Route::get('/', [PendaftarController::class, 'createUser'])->name('viewUser');
Route::post('createUser', [PendaftarController::class, 'storeUser'])->name('createUser');

Route::post('doLogin', [AuthController::class, 'login'])->name('doLogin');
Route::get('admin/login', [AuthController::class, 'viewLogin'])->name('login');
Route::post('adminlogout', [AuthController::class, 'logout'])->name('logout');


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

Route::get('/print-formulir-admin/{id}', [InformasiController::class, 'printFormulir'])->name('print.formulir.admin');

Route::get('provinces', [App\Http\Controllers\DaerahController::class, 'provinces'])->name('provinces');
Route::get('cities', [App\Http\Controllers\DaerahController::class, 'cities'])->name('cities');
Route::get('districts', [App\Http\Controllers\DaerahController::class, 'districts'])->name('districts');
Route::get('villages', [App\Http\Controllers\DaerahController::class, 'villages'])->name('villages');
Route::resource('pendaftaran', PendaftarController::class);


// Protected Routes (Auth Required)
Route::middleware(['auth'])->group(function () {
    // IKI AUTH
    Route::resource('gelombang', GelombangController::class);
    // Public Routes
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');
Route::resource('gelombang', GelombangController::class);
