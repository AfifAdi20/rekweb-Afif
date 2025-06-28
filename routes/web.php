<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login-form');
    Route::post('/login-user', [AuthController::class, 'login'])->name('login-user');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/mahasiswa', function () {
        return view('mahasiswa');
    })->name('mahasiswa');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');