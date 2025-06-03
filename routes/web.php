<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Visitor Routes
Route::get('/register', [RegisterController::class, 'index'])->name('register.page');
Route::post('/register', [RegisterController::class, 'store'])->name('register');
Route::get('/login', [LoginController::class, 'index'])->name('login.page');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


// Authentication Routes
Route::middleware(['auth'])->group(function () {
    // Admin Routes
    Route::prefix('admin')->group(function () {
        // Admin Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    });
});
