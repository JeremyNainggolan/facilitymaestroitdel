<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [\App\Http\Controllers\Api\AuthAPI::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Api\AuthAPI::class, 'logout']);
    Route::apiResource('/facility', \App\Http\Controllers\Api\FacilityAPI::class);
    Route::apiResource('/item', \App\Http\Controllers\Api\ItemAPI::class);
    Route::apiResource('/user', \App\Http\Controllers\Api\UserAPI::class);
    Route::apiResource('/storage', \App\Http\Controllers\Api\StorageAPI::class);
});

Route::apiResource('/status', \App\Http\Controllers\Api\RentStatus::class);
Route::apiResource('/hateoas/facility', \App\Http\Controllers\Api\Hateoas\FacilityHateoas::class);
Route::apiResource('/hateoas/item', \App\Http\Controllers\Api\Hateoas\ItemHateoas::class);
Route::apiResource('/hateoas/user', \App\Http\Controllers\Api\Hateoas\UserHateoas::class);
