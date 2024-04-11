<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\ProfileController;
use App\Http\Controllers\Api\V1\TagController;

Route::prefix('v1')->group(function () {
    Route::get('profile/', [ProfileController::class, 'index']);
    Route::apiResource('tags', TagController::class);
});
