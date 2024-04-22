<?php

use App\Http\Controllers\Api\V1\AgencyController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\V1\TagController;
use App\Http\Controllers\Api\V1\DestinationController;
use App\Http\Controllers\Api\V1\ProfileController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\V1\GuestController;
use App\Http\Controllers\Api\V1\TripController;

Route::prefix('v1')->group(function () {

    //public endpoints
    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [LoginController::class, 'register']);

    //protected endpoints
    Route::get('tags', [TagController::class, 'index']);

    Route::apiResource('destinations', DestinationController::class, ['except' => ['store', 'delete', 'update']]);
    Route::middleware('auth:sanctum')->group(function () {

        Route::post('logout', [LoginController::class, 'logout']);
        Route::apiResource('tags', TagController::class, ['except' => ['index']]);
        Route::apiResource('agencies', AgencyController::class);
        Route::apiResource('destinations', DestinationController::class, ['except' => ['index', 'show']]);
        Route::apiResource('profiles', ProfileController::class);

        Route::post('profiles/{profile_id}/tags', [ProfileController::class, 'addTags']);

        Route::get('profiles/{profile}/trips', [ProfileController::class, 'getMyTrips']);
        Route::get('profiles/{profile}/trips/{trip_id}', [ProfileController::class, 'showTrip']);


        Route::get('agencies/{agency}/trips', [AgencyController::class, 'getAgencyTrips']);
        Route::get('agencies/{agency}/trips/{trip_id}', [AgencyController::class, 'showAgencyTrip']);

        Route::post('trip-request', [TripController::class, 'TripRequest']);
        Route::post('trip', [TripController::class, 'Trip']);

        Route::post('destinations/{destination_id}/tags', [DestinationController::class, 'addTags']);
        Route::get('destinations/{destination}/prices', [DestinationController::class, 'getAllPrice']);
        Route::post('destinations/{destination}/prices/add', [DestinationController::class, 'addPrices']);
        Route::post('destinations/{destination}/prices', [DestinationController::class, 'getPriceByDate']);
        Route::post('destinations/{destination}/addGallery', [DestinationController::class, 'addGallery']);
        //  Route::get('destinations/filter/', [DestinationController::class, 'filterbyTags']);
    });
});
