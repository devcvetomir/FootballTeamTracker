<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\PlayerController as PlayerController;
use App\Http\Controllers\Api\v1\TeamController as TeamController;
use App\Http\Controllers\LoginController;



Route::post('login',[LoginController::class,'login']);



Route::middleware('auth:sanctum')->group(function () {
    Route::post('check-token',[LoginController::class,'checkToken']);

    Route::apiResource('players',PlayerController::class);
    Route::apiResource('teams', TeamController::class);
});


