<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('teams', TeamController::class);
Route::apiResource('players', PlayerController::class);
Route::get('winning-chances', [TeamController::class, 'getWinningChances']);

Route::post('simulate-match', [PlayerController::class,'simulateMatch']);
