<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\RentController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\StorageController;
use App\Http\Controllers\User\BookController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\HistoryController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\URentController;
use App\Http\Controllers\User\UserController;
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
            Route::get('edit/{id}', [AdminController::class, 'edit']);
            Route::post('edit/{id}', [AdminController::class, 'update']);
            Route::get('history/{id}', [AdminController::class, 'history']);
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
            Route::get('edit/{id}', [StorageController::class, 'edit']);
            Route::post('edit/{id}', [StorageController::class, 'update']);
            Route::post('delete', [StorageController::class, 'delete'])->name('storage.delete');
        });

        Route::prefix('rent')->group(function () {
            Route::get('/', [RentController::class, 'index']);
            Route::get('/request', [RentController::class, 'index']);
            Route::post('/request', [RentController::class, 'index'])->name('post.request');
            Route::get('/active', [RentController::class, 'active']);
            Route::post('/active', [RentController::class, 'active'])->name('post.return');
            Route::post('/active/report', [RentController::class, 'report'])->name('report.add');
        });


        Route::prefix('facility')->group(function () {
            Route::get('/', [FacilityController::class, 'index']);
            Route::get('/add', [FacilityController::class, 'add']);
            Route::post('/add', [FacilityController::class, 'store'])->name('facility.add');
            Route::get('/edit/{id}', [FacilityController::class, 'edit']);
            Route::post('/edit/{id}', [FacilityController::class, 'update']);
            Route::post('delete', [FacilityController::class, 'delete'])->name('facility.delete');
        });

        Route::prefix('report')->group(function () {
            Route::get('/', [ReportController::class, 'index']);
            Route::get('/detail/{id}', [ReportController::class, 'detail']);
        });
    });
});

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/home', [HomeController::class, 'index']);

    Route::prefix('rent')->group(function () {
        Route::get('/', [URentController::class, 'index']);
        Route::post('/', [URentController::class, 'add'])->name('rent.add');
        Route::get('/cart', [CartController::class, 'index']);
        Route::post('/cart', [CartController::class, 'add'])->name('cart.add');
        Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
        Route::get('/destroy', [CartController::class, 'destroy'])->name('cart.destroy');

    });


    Route::get('/book', [BookController::class, 'index']);
    Route::post('/book', [BookController::class, 'index']);

    Route::get('/history', [HistoryController::class, 'index']);
    Route::get('/history/facility', [HistoryController::class, 'facility']);

    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile', [ProfileController::class, 'index'])->name('edit');
});
