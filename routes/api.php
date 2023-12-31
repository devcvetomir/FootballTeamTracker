<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\PlayerController as PlayerController;
use App\Http\Controllers\Api\v1\TeamController as TeamController;
use App\Http\Controllers\TokenController;



Route::post('/token',[TokenController::class,'getToken']);



Route::middleware('auth:sanctum')->group(function () {
    Route::post('/check-token',[TokenController::class,'checkToken']);

    Route::apiResource('players',PlayerController::class);
    Route::apiResource('teams', TeamController::class);
});


