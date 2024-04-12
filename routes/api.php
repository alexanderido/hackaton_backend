<?php

use App\Http\Controllers\Api\V1\AgencyController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\V1\TagController;
use App\Http\Controllers\Api\V1\DestinationController;
use App\Http\Controllers\Api\V1\ProfileController;


Route::prefix('v1')->group(function () {

    Route::apiResource('tags', TagController::class);
    Route::apiResource('agencies', AgencyController::class);
    Route::apiResource('destinations', DestinationController::class);
    Route::apiResource('profiles', ProfileController::class);
});
