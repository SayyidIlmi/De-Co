<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllers;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RapatController;

// [PUBLIC RESTRICTED] Route untuk mendapatkan token login fungsionaris
Route::post('/login', [AuthControllers::class, 'apiLogin']);

// [PROTECTED ROUTES] Semua request di bawah ini wajib membawa Bearer Token
Route::post('/events/daftar', [EventController::class, 'daftarEvent']);
Route::middleware('auth:sanctum')->group(function () {
    
    Route::post('/logout', [AuthControllers::class, 'logout']);
    // Index & Show Event (Bisa diakses Koordinator, Anggota, Staf yang sudah login)
    Route::get('/events', [EventController::class, 'index']);
    Route::get('/events/{id}', [EventController::class, 'show']);

    Route::get('/rapat', [RapatController::class, 'index']);
    Route::get('/rapat/{id}', [RapatController::class, 'show']);

    // Khusus Koordinator (Menggunakan alias middleware 'admin' milik Laravel 11 kamu)
    Route::middleware('admin:koordinator')->group(function () {
        Route::post('/events', [EventController::class, 'store']);
        Route::post('/rapat', [RapatController::class, 'store']);
        Route::post('/events/{id}/materials', [EventController::class, 'uploadMaterial']);
    });

});