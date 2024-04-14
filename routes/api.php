<?php

use App\Http\Controllers\Api\V1\AgencyController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\V1\TagController;
use App\Http\Controllers\Api\V1\DestinationController;
use App\Http\Controllers\Api\V1\ProfileController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\V1\GuestController;

Route::prefix('v1')->group(function () {

    //public endpoints
    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [LoginController::class, 'register']);

    //protected endpoints
    Route::get('tags', [TagController::class, 'index']);

    Route::get('destinations/filter/{tag_id}', [DestinationController::class, 'filterbyTag']);
    Route::apiResource('destinations', DestinationController::class, ['except' => ['store', 'delete', 'update']]);
    Route::middleware('auth:sanctum')->group(function () {

        Route::post('logout', [LoginController::class, 'logout']);
        Route::apiResource('tags', TagController::class, ['except' => ['index']]);
        Route::apiResource('agencies', AgencyController::class);
        Route::apiResource('destinations', DestinationController::class, ['except' => ['index', 'show']]);
        Route::apiResource('profiles', ProfileController::class);

        Route::post('profiles/{profile_id}/tags', [ProfileController::class, 'addTags']);
        /* 
        Route::get('profiles/{profile_id}/guests', [ProfileController::class, 'getGuestsByProfileId']);
        Route::get('profiles/{profile_id}/guests/{id}', [ProfileController::class, 'getGuestsById']); */

        Route::post('destinations/{destination_id}/tags', [DestinationController::class, 'addTags']);
    });
});
