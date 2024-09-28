<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'store'])->name('register');
Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'authentication'])->name('login');
Route::get('admin/login', [UserController::class, 'adminLogin']);


Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::post('admin/login', [UserController::class, 'authentication'])->name('admin.login');
    Route::get('admin/logout', [UserController::class, 'logout'])->name('admin.logout');
    Route::get('admin/dashboard', [UserController::class, 'dashboard'])->name('admin.logout');
});

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/', [UserController::class, 'home'])->name('home');
    Route::get('home', [UserController::class, 'home'])->name('home');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});
