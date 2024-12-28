<?php
// filepath: /c:/Users/ASUS/Documents/GitHub/aquavision_wad/routes/web.php

use App\Http\Controllers\AnalisisController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SubscriptionController;

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'login'])->name('login');

Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('registration')->middleware('guest');
Route::post('/register', [RegistrationController::class, 'store'])->name('registration');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/sensor', [SensorController::class, 'index'])->name('sensor.index')->middleware('auth');
// Route::resource('/sensor', SensorController::class);
Route::get('/create_sensor', [SensorController::class, 'getCreateForm'])->name('create_sensor');
Route::post('/create_sensor', [SensorController::class, 'store'])->name('store_sensor');
Route::put('/sensors/{id}', [SensorController::class, 'update'])->name('sensor.update');
Route::delete('/sensors/{id}', [SensorController::class, 'destroy'])->name('sensor.destroy');

Route::get('/analisis', [AnalisisController::class, 'index'])->name('analisis')->middleware('auth');

Route::get('/profile/{user}', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::get('/subscription/{user}', [SubscriptionController::class, 'index'])->name('subscription')->middleware('auth');
Route::post('/subscription/{user}', [SubscriptionController::class, 'store'])->name('subscription')->middleware('auth');
Route::get('/subscription/success/{subscription}', [SubscriptionController::class, 'success'])->name('subscription.success')->middleware('auth');

Route::post('/clear-session', [SessionController::class, 'clearSession'])->name('clear.session');