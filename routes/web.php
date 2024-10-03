<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'store'])->name('register');
Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'authentication'])->name('login');
Route::get('admin/login', [UserController::class, 'admin_login']);
Route::post('admin/login', [UserController::class, 'admin_auth'])->name('admin.login');

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('admin/logout', [UserController::class, 'logout'])->name('admin.logout');
    Route::get('admin/dashboard', [UserController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [UserController::class, 'home']);
    Route::get('/rent', [UserController::class, 'rent']);
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});
