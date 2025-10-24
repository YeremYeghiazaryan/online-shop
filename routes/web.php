<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
require __DIR__.'/admin.php';
require __DIR__.'/auth.php';


//Route::redirect('/', '/login');
//
//Route::get('/login', [AuthController::class, 'indexLogin'])->name('login.index');
//Route::get('/register', [AuthController::class, 'indexRegister'])->name('register.index');
//Route::post('/login', [AuthController::class, 'login'])->name('login.store');
//Route::post('/register', [AuthController::class, 'register'])->name('register.store');
//Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//
//Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google-redirect');
//Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
//
//Route::get('/index', [IndexController::class, 'dashboardIndex'])->name('dashboard.index');



