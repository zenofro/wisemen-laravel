<?php

namespace App\Http\Controllers\Api\V1\Pokemons;

use App\Http\Resources\PokemonCollection;
use App\Models\Pokemon;

class IndexPokemonController
{
    public function __invoke()
    {
        return new PokemonCollection(
            Pokemon::with([
                'sprite',
                'abilities',
                'moves.versions',
                'stats',
                'types',
            ])->get()
        );
    }
}
