<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GelombangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(AuthController::class)->group(function () {
    Route::get('viewLogin', 'viewLogin')->name('viewLogin');
    Route::post('login', 'login')->name('login');
    Route::get('viewRegister', 'viewRegister')->name('viewRegister');
    Route::post('register', 'register')->name('register');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('gelombang', GelombangController::class);

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
