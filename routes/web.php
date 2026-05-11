<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

// 1. Halaman Home
Route::get('/', [WelcomeController::class, 'index']);

// 2. Halaman Products (dengan Route Prefix)
Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [ProductController::class, 'foodBeverage']);
    Route::get('/beauty-health', [ProductController::class, 'beautyHealth']);
    Route::get('/home-care', [ProductController::class, 'homeCare']);
    Route::get('/baby-kid', [ProductController::class, 'babyKid']);
});

// 3. Halaman Penjualan
Route::get('/sales', [SalesController::class, 'index']);

// 4. Implementasi CRUD (Praktikum 4 & 5)

// --- Route Level ---
Route::group(['prefix' => 'level'], function () {
     Route::get('/{id}/show', [LevelController::class, 'show']);
    Route::get('/', [LevelController::class, 'index']);
    Route::post('/list', [LevelController::class, 'list']);
    Route::get('/create', [LevelController::class, 'create']);
    Route::post('/', [LevelController::class, 'store']);
    Route::get('/{id}/edit', [LevelController::class, 'edit']);
    Route::put('/{id}', [LevelController::class, 'update']);
    Route::delete('/{id}', [LevelController::class, 'destroy']);
});

// --- Route Kategori ---
Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::post('/list', [KategoriController::class, 'list']);
    Route::get('/create', [KategoriController::class, 'create']);
    Route::post('/', [KategoriController::class, 'store']);
    Route::get('/{id}/show', [KategoriController::class, 'show']);
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/{id}', [KategoriController::class, 'update']);
    Route::delete('/{id}', [KategoriController::class, 'destroy']);
});

// --- Route Supplier ---
Route::group(['prefix' => 'supplier'], function () {
    Route::get('/', [SupplierController::class, 'index']);
    Route::post('/list', [SupplierController::class, 'list']);
    Route::get('/create', [SupplierController::class, 'create']);
    Route::post('/', [SupplierController::class, 'store']);
    Route::get('/{id}', [SupplierController::class, 'show']);
    Route::get('/{id}/edit', [SupplierController::class, 'edit']);
    Route::put('/{id}', [SupplierController::class, 'update']);
    Route::delete('/{id}', [SupplierController::class, 'destroy']);
});

// --- Route User ---
Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);          // Halaman awal user
    Route::post('/list', [UserController::class, 'list']);      // Data JSON untuk DataTables
    Route::get('/create', [UserController::class, 'create']);    // Form tambah
    Route::post('/', [UserController::class, 'store']);         // Simpan baru
    Route::get('/create_ajax', [UserController::class, 'create_ajax']);
    Route::post('/ajax', [UserController::class, 'store_ajax']);
    Route::get('/{id}', [UserController::class, 'show']);       // Detail
    Route::get('/{id}/edit', [UserController::class, 'edit']);  // Form edit
    Route::put('/{id}', [UserController::class, 'update']);     // Simpan perubahan
    Route::delete('/{id}', [UserController::class, 'destroy']); // Hapus
});

// --- Route Barang ---
Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [BarangController::class, 'index']);        // Halaman awal barang
    Route::post('/list', [BarangController::class, 'list']);    // Data JSON untuk DataTables
    Route::get('/create', [BarangController::class, 'create']);  // Form tambah
    Route::post('/', [BarangController::class, 'store']);       // Simpan baru
    Route::get('/{id}', [BarangController::class, 'show']);     // Detail
    Route::get('/{id}/edit', [BarangController::class, 'edit']); // Form edit
    Route::put('/{id}', [BarangController::class, 'update']);   // Simpan perubahan
    Route::delete('/{id}', [BarangController::class, 'destroy']);// Hapus
});