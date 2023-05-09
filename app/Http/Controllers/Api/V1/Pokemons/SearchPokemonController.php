<?php

namespace App\Http\Controllers\Api\V1\Pokemons;

use App\Http\Resources\PokemonCollection;
use App\Models\Pokemon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class SearchPokemonController
{
    use ValidatesRequests;

    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'query' => ['required', 'string'],
            'limit' => ['nullable', 'integer'],
        ]);

        $pokemons = Pokemon::with(['types', 'sprite'])
            ->where(function (Builder $query) use ($request){
                $query->where('name', 'like', "%{$request->input('query')}%")
                    ->orWhereRelation('types', 'type', 'like', "%{$request->input('query')}%");
            })
            ->take($request->input('limit'))
            ->get();

        return new PokemonCollection($pokemons);
    }
}
