<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllers;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Models\User;
use App\Http\Controllers\RapatController;

Route::middleware('auth')->group(function () {
    Route::get('/rapat', function () {
        return view('katalograpat');
        });
        Route::get('/rapat', [RapatController::class, 'index']);
        // Route::get('/event', [EventController::class, 'index']);
        // Route::get('/event/detail/{id}', [EventController::class, 'show']);
        Route::post('/logout', [AuthControllers::class, 'logout']);
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // Semua user terautentikasi bisa menarik data untuk Event Cards
        // Khusus Koordinator yang bisa mengeksekusi pembuatan event baru
        Route::middleware('admin:koordinator')->group(function () {
        Route::get('/rapat/buatRapat', function () {
            $users = User::orderBy('username', 'asc')->get();
                return view('create-meeting',compact('users'));
            });
        Route::get('/event/create', function () {
                    return view('createevent');
                });
        Route::post('/event', [EventController::class, 'store']);
        Route::post('/event/material/{id}', [EventController::class, 'uploadMaterial']);
        Route::post('/event/documentation/{id}', [EventController::class, 'uploadDocumentation']);
        Route::post('/rapat', [RapatController::class, 'store']);
        });

});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', [function () {
    return view('register');
}]);
// 
Route::get('/event', [EventController::class, 'index']);
Route::get('/event/{id}', [EventController::class, 'show']);
Route::get('/event/daftar/{id}', [EventController::class, 'showRegistrationForm']);
Route::post('/event/daftar/{id}', [EventController::class, 'daftarEvent']);
// 
// route front end
Route::get('/login', [AuthControllers::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthControllers::class, 'authenticate']);
Route::get('/register', [AuthControllers::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthControllers::class, 'register']);


