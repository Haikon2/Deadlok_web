<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HeroController;
use App\Http\Controllers\Api\ItemController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Heroes API
Route::apiResource('heroes', HeroController::class);

// Items API
Route::apiResource('items', ItemController::class);
