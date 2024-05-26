<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RiwayatController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'index')->name('login');
        Route::post('/login', 'login')->name('login.proses');
    });
});

Route::middleware('auth')->group(function () {
    Route::controller(ItemController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/item', 'index')->name('data-barang');
        Route::post('/item/create', 'create')->name('data-barang.create');
        Route::put('/item/update/{id}', 'update')->name('data-barang.update');
        Route::put('/item/update/stok/{id}/{kategori}', 'stok')->name('data-barang.update.stok');
        Route::put('/item/use/{id}', 'use')->name('data-barang.use');
        Route::get('/item/status/{id}/{status}', 'status')->name('data-barang.status');
    });

    Route::controller(RiwayatController::class)->group(function () {
        Route::get('/history', 'index')->name('riwayat');
    });

    Route::controller(ProfilController::class)->group(function () {
        Route::get('/profil', 'index')->name('profil');
        Route::put('/profil/update', 'update')->name('profil.update');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
