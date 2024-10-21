<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AreaController;
use \App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'store'])->name('register');
Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'authentication'])->name('login');

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'login']);
    Route::post('login', [AdminController::class, 'post_login'])->name('admin.login');

    Route::middleware(['auth', 'user-access:admin'])->group(function () {
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('dashboard', [AdminController::class, 'dashboard']);
        Route::get('user', [AdminController::class, 'user']);
        Route::get('user/edit', [AdminController::class, 'edit']);

        Route::prefix('item')->group(function () {
            Route::get('/', [ItemController::class, 'index']);
            Route::get('add', [ItemController::class, 'add']);
            Route::post('add', [ItemController::class, 'store'])->name('item.add');
            Route::get('edit/{id}', [ItemController::class, 'edit']);
            Route::post('edit/{id}', [ItemController::class, 'update']);
            Route::post('delete', [ItemController::class, 'delete'])->name('item.delete');
        });

        Route::prefix('area')->group(function () {
            Route::get('area', [AreaController::class, 'index']);
        });
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [UserController::class, 'home']);
    Route::get('/rent', [UserController::class, 'rent']);
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});
