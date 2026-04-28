<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
use Illuminate\Support\Facades\Route;

// 1. Halaman Home
Route::get('/', [HomeController::class, 'index']);

// 2. Halaman Products (dengan Route Prefix)
Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [ProductController::class, 'foodBeverage']);
    Route::get('/beauty-health', [ProductController::class, 'beautyHealth']);
    Route::get('/home-care', [ProductController::class, 'homeCare']);
    Route::get('/baby-kid', [ProductController::class, 'babyKid']);
});

// 3. Halaman User (dengan Route Parameter)
Route::get('/user/{id}/name/{name}', [UserController::class, 'show']);

// 4. Halaman Penjualan
Route::get('/sales', [SalesController::class, 'index']);