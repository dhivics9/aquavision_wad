<?php
// filepath: /c:/Users/ASUS/Documents/GitHub/aquavision_wad/routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SensorController;

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login'])->name('login');
Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('registration');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/sensor', [SensorController::class, 'index'])->name('sensor');