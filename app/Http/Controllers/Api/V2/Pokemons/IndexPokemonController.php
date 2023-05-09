<?php

namespace App\Http\Controllers\Api\V2\Pokemons;

use App\Http\Resources\PokemonCollection;
use App\Models\Pokemon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class IndexPokemonController
{
    use ValidatesRequests;

    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'sort' => ['nullable', Rule::in(['name-asc', 'name-desc', 'id-asc', 'id-desc'])],
            'limit' => ['nullable', 'integer'],
        ]);

        [$sortColumn, $sortDirection] = explode('-', $request->input('sort'));

        $pokemons = Pokemon::with([
            'sprite',
            'abilities',
            'moves.versions',
            'stats',
            'types',
        ])->when(
            $request->has('sort'),
            fn(Builder $query) => $query->orderByRaw("{$sortColumn} {$sortDirection}")
        )->paginate($request->input('limit', 5));

        return new PokemonCollection($pokemons);
    }
}
