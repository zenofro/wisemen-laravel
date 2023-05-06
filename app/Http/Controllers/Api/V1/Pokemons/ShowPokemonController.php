<?php

namespace App\Http\Controllers\Api\V1\Pokemons;

use App\Http\Resources\PokemonResource;
use App\Models\Pokemon;

class ShowPokemonController
{
    public function __invoke(Pokemon $pokemon)
    {
        $pokemon->load([
            'sprite',
            'abilities',
            'moves.versions',
            'stats',
            'types',
        ]);

        return new PokemonResource($pokemon);
    }
}
