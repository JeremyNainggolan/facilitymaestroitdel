<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RentController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\StorageController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'store'])->name('register');
Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'authentication'])->name('login');

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'login']);
    Route::post('login', [AdminController::class, 'post_login'])->name('admin.login');

    Route::middleware(['auth', 'user-access:admin'])->group(function () {
        Route::get('/', [AdminController::class, 'dashboard']);
        Route::get('dashboard', [AdminController::class, 'dashboard']);
        Route::get('profile', [AdminController::class, 'profile']);
        Route::post('profile', [AdminController::class, 'profile'])->name('edit.profile');
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');

        Route::prefix('user')->group(function () {
            Route::get('/', [AdminController::class, 'user']);
            Route::get('edit', [AdminController::class, 'edit']);
        });

        Route::prefix('item')->group(function () {
            Route::get('/', [ItemController::class, 'index']);
            Route::get('add', [ItemController::class, 'add']);
            Route::post('add', [ItemController::class, 'store'])->name('item.add');
            Route::get('edit/{id}', [ItemController::class, 'edit']);
            Route::post('edit/{id}', [ItemController::class, 'update']);
            Route::post('delete', [ItemController::class, 'delete'])->name('item.delete');
        });

        Route::prefix('storage')->group(function () {
            Route::get('/', [StorageController::class, 'index']);
            Route::get('/add', [StorageController::class, 'add']);
            Route::post('/add', [StorageController::class, 'store'])->name('storage.add');
            Route::post('delete', [StorageController::class, 'delete'])->name('storage.delete');
        });

        Route::prefix('rent')->group(function () {
            Route::get('/', [RentController::class, 'index']);
            Route::get('/request', [RentController::class, 'index']);
            Route::get('/active', [RentController::class, 'active']);
        });

        Route::prefix('facility')->group(function () {
            Route::get('/', [FacilityController::class, 'index']);
            Route::get('/add', [FacilityController::class, 'add']);
        });

        Route::prefix('report')->group(function () {
            Route::get('/', [ReportController::class, 'index']);
        });
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [UserController::class, 'home']);
    Route::get('/home', [UserController::class, 'home']);
    Route::get('/rent', [UserController::class, 'rent']);
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});
