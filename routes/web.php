<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GelombangController;
use App\Http\Controllers\PendaftarController;
use App\Models\Gelombang;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
})->name('home');

Route::get('/informasi', function () {
    return view('user.informasi');
})->name('informasi');

Route::get('/daftar', function () {
    return view('user.index');
})->name('daftar');

Route::resource('gelombang', GelombangController::class);

Route::controller(AuthController::class)->group(function () {
    Route::get('viewLogin', 'viewLogin')->name('viewLogin');
    Route::post('login', 'login')->name('login');
    Route::get('viewRegister', 'viewRegister')->name('viewRegister');
    Route::post('register', 'register')->name('register');
});

Route::resource('pendaftaran', PendaftarController::class);


Route::middleware(['auth'])->group(function () {

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

