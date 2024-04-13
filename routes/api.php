<?php

use App\Http\Controllers\Api\V1\AgencyController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\V1\TagController;
use App\Http\Controllers\Api\V1\DestinationController;
use App\Http\Controllers\Api\V1\ProfileController;
use App\Http\Controllers\Api\LoginController;


Route::prefix('v1')->group(function () {

    //public endpoints
    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [LoginController::class, 'register']);

    //protected endpoints
    Route::middleware('auth:sanctum')->group(function () {

        Route::post('logout', [LoginController::class, 'logout']);
        Route::apiResource('tags', TagController::class);
        Route::apiResource('agencies', AgencyController::class);
        Route::apiResource('destinations', DestinationController::class);
        Route::apiResource('profiles', ProfileController::class);
    });
});
