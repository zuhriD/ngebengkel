<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/login', [App\Http\Controllers\Auth\AuthController::class, 'index_login'])->name('login')->middleware('guest');
// Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'login'])->middleware('guest');
// Route::get('/register', [App\Http\Controllers\Auth\AuthController::class, 'index_register'])->name('register');
// Route::post('/register', [App\Http\Controllers\Auth\AuthController::class, 'register']);
// Route::get('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->middleware('auth');


// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
// Route::resource('vehicle', App\Http\Controllers\VehicleController::class)->middleware('auth');
// Route::post('/booking/{service_type}', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store')->middleware('auth');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [App\Http\Controllers\Auth\AuthController::class, 'index_login'])->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'login']);
});

Route::get('/register', [App\Http\Controllers\Auth\AuthController::class, 'index_register'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\AuthController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout']);

    // Home and Resource Routes
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('vehicle', App\Http\Controllers\VehicleController::class);
    Route::post('/booking/{service_type}', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');
});
