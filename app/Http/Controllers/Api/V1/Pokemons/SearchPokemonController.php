<?php

namespace App\Http\Controllers\Api\V1\Pokemons;

use App\Http\Resources\PokemonCollection;
use App\Models\Pokemon;
use App\Models\PokemonType;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
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

        return new JsonResponse([
            'data' => $pokemons->map(function (Pokemon $pokemon){
                return [
                    'id' => $pokemon->id,
                    'name' => $pokemon->name,
                    'sprites' => ['front_default' => $pokemon->sprite?->front_default],
                    'types' => $pokemon->types->map(function (PokemonType $type){
                        return [
                            'type' => ['name' => $type->type],
                            'slot' => $type->slot,
                        ];
                    })
                ];
            })
        ]);

        // return new PokemonCollection($pokemons);
    }
}
