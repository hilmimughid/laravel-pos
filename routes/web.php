<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\LevelUserController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\StokBarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index']);

Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('list', [UserController::class, 'list']);
    Route::get('create', [UserController::class, 'create']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::get('/{id}/edit', [UserController::class, 'edit']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

Route::prefix('level')->group(function () {
    Route::get('/', [LevelUserController::class, 'index']);
    Route::get('list', [LevelUserController::class, 'list']);
    Route::get('create', [LevelUserController::class, 'create']);
    Route::post('/', [LevelUserController::class, 'store']);
    Route::get('/{id}', [LevelUserController::class, 'show']);
    Route::get('/{id}/edit', [LevelUserController::class, 'edit']);
    Route::put('/{id}', [LevelUserController::class, 'update']);
    Route::delete('/{id}', [LevelUserController::class, 'destroy']);
});

Route::prefix('kategori')->group(function () {
    Route::get('/', [KategoriBarangController::class, 'index']);
    Route::get('list', [KategoriBarangController::class, 'list']);
    Route::get('create', [KategoriBarangController::class, 'create']);
    Route::post('/', [KategoriBarangController::class, 'store']);
    Route::get('/{id}', [KategoriBarangController::class, 'show']);
    Route::get('/{id}/edit', [KategoriBarangController::class, 'edit']);
    Route::put('/{id}', [KategoriBarangController::class, 'update']);
    Route::delete('/{id}', [KategoriBarangController::class, 'destroy']);
});

Route::prefix('barang')->group(function () {
    Route::get('/', [BarangController::class, 'index']);
    Route::get('list', [BarangController::class, 'list']);
    Route::get('create', [BarangController::class, 'create']);
    Route::post('/', [BarangController::class, 'store']);
    Route::get('/{id}', [BarangController::class, 'show']);
    Route::get('/{id}/edit', [BarangController::class, 'edit']);
    Route::put('/{id}', [BarangController::class, 'update']);
    Route::delete('/{id}', [BarangController::class, 'destroy']);
});

Route::prefix('stok')->group(function () {
    Route::get('/', [StokBarangController::class, 'index']);
    Route::get('list', [StokBarangController::class, 'list']);
    Route::get('create', [StokBarangController::class, 'create']);
    Route::post('/', [StokBarangController::class, 'store']);
    Route::get('/{id}', [StokBarangController::class, 'show']);
    Route::get('/{id}/edit', [StokBarangController::class, 'edit']);
    Route::put('/{id}', [StokBarangController::class, 'update']);
    Route::delete('/{id}', [StokBarangController::class, 'destroy']);
});

Route::prefix('penjualan')->group(function () {
    Route::get('/', [PenjualanController::class, 'index']);
    Route::get('list', [PenjualanController::class, 'list']);
    Route::get('create', [PenjualanController::class, 'create']);
    Route::post('/', [PenjualanController::class, 'store']);
    Route::get('/{id}', [PenjualanController::class, 'show']);
    Route::get('/{id}/edit', [PenjualanController::class, 'edit']);
    Route::put('/{id}', [PenjualanController::class, 'update']);
    Route::delete('/{id}', [PenjualanController::class, 'destroy']);
});
