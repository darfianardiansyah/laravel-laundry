<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.auth');

Route::get('/', [AuthController::class, 'login'])->name('login');

Route::middleware(['authenticate'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('master')->group(function () {
        // route customer
        Route::prefix('customer')->group(function () {
            Route::get('/', [CustomerController::class, 'index'])->name('master.customer');
            // Route::post('/store', [CustomerController::class, 'store'])->name('master.customer.store');
        });

        // route service
        Route::get('/service', [ServiceController::class, 'index'])->name('master.service');
    });

    // route transaction
    Route::get('/transaction', [OrderController::class, 'index'])->name('order');
    Route::get('/transaction/print/{id}', [OrderController::class, 'print'])->name('order.print');

    // route user
    Route::get('/user', [UserController::class, 'index'])->name('user');

    // route logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout.auth');
});
