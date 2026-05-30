<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllers;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RapatController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', function () {
    return view('register');
});
// 
Route::get('/event', function () {
    return view('event');
});
Route::get('/event/detail', function () {
    return view('detailevent');
});
Route::get('/event/create', function () {
    return view('createevent');
});
Route::get('/rapat', function () {
    return view('katalograpat');
});
Route::get('/event/daftar', function () {
    return view('pendaftaranevent');
});

Route::get('/rapat/buatRapat', function () {
    return view('create-meeting');
});
// route front end
// 
Route::get('/login', [AuthControllers::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthControllers::class, 'authenticate']);
Route::get('/register', [AuthControllers::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthControllers::class, 'register']);

Route::get('/rapat', [RapatController::class, 'index']);
Route::get('/rapat/{id}', [RapatController::class, 'show']);
Route::get('/events', [EventController::class, 'index']);
Route::get('/events/daftar', [EventController::class, 'daftarEvent']);
Route::get('/events/{id}', [EventController::class, 'show']);

    Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthControllers::class, 'logout']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
            // Semua user terautentikasi bisa menarik data untuk Event Cards
    // Khusus Koordinator yang bisa mengeksekusi pembuatan event baru
    Route::middleware('admin:koordinator')->group(function () {
        Route::post('/events', [EventController::class, 'store']);
        Route::post('/events/{id}/materials', [EventController::class, 'uploadMaterial']);
        Route::post('/events/{id}/documentations', [EventController::class, 'uploadDocumentation']);
        Route::post('/rapat', [RapatController::class, 'store']);
    });

});
