<?php

use App\Http\Controllers\Api\V1\Pokemons\IndexPokemonController;
use App\Http\Controllers\Api\V1\Pokemons\SearchPokemonController;
use App\Http\Controllers\Api\V1\Pokemons\ShowPokemonController;
use App\Http\Controllers\Api\V1\Teams\AttachPokemonsToTeamController;
use App\Http\Controllers\Api\V1\Teams\IndexTeamController;
use App\Http\Controllers\Api\V1\Teams\ShowTeamController;
use App\Http\Controllers\Api\V1\Teams\StoreTeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function (){
    Route::prefix('pokemons')->group(function (){
        Route::get('/', IndexPokemonController::class);
        Route::get('search', SearchPokemonController::class);
        Route::get('{pokemon}', ShowPokemonController::class);
    });

    Route::prefix('teams')->middleware(['auth:sanctum'])->group(function (){
        Route::get('/', IndexTeamController::class);
        Route::post('create', StoreTeamController::class);
        Route::get('{team}', ShowTeamController::class);
        Route::post('{team}', AttachPokemonsToTeamController::class);
    });
});

Route::prefix('v2')->group(function (){
    Route::prefix('pokemons')->group(function (){
        Route::get('/', \App\Http\Controllers\Api\V2\Pokemons\IndexPokemonController::class);
    });
});
