<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/facility', \App\Http\Controllers\Api\FacilityAPI::class);
Route::apiResource('/item', \App\Http\Controllers\Api\ItemAPI::class);
Route::apiResource('/user', \App\Http\Controllers\Api\UserAPI::class);
