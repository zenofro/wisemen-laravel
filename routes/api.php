<?php

use App\Http\Controllers\Api\V1\Pokemons\IndexPokemonController;
use App\Http\Controllers\Api\V1\Pokemons\ShowPokemonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function (){
    Route::prefix('pokemons')->group(function (){
        Route::get('/', IndexPokemonController::class);
        Route::get('{pokemon}', ShowPokemonController::class);
    });
});
