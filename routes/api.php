<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\ProfileController;



Route::prefix('v1')->group(function () {
    Route::get('profile/', [ProfileController::class, 'index']);
});
