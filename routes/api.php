<?php

use App\Http\Controllers\Api\V1\Pokemons\IndexPokemonController;
use App\Http\Controllers\Api\V1\Pokemons\SearchPokemonController;
use App\Http\Controllers\Api\V1\Pokemons\ShowPokemonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function (){
    Route::prefix('pokemons')->group(function (){
        Route::get('/', IndexPokemonController::class);
        Route::get('search', SearchPokemonController::class);
        Route::get('{pokemon}', ShowPokemonController::class);
    });
});

Route::prefix('v2')->group(function (){
    Route::prefix('pokemons')->group(function (){
        Route::get('/', \App\Http\Controllers\Api\V2\Pokemons\IndexPokemonController::class);
    });
});
