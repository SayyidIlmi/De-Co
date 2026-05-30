<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllers;
use App\Http\Controllers\DashboardController;

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
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Tambahkan route lain di sini...
});