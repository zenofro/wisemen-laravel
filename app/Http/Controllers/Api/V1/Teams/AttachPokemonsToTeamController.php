<?php

namespace App\Http\Controllers\Api\V1\Teams;

use App\Http\Resources\TeamResource;
use App\Models\Pokemon;
use App\Models\Team;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AttachPokemonsToTeamController
{
    use ValidatesRequests;

    public function __invoke(Team $team, Request $request)
    {
        $this->validate($request, [
            'pokemons' => ['nullable', 'array'],
            'pokemons.*' => [Rule::in(Pokemon::pluck('id'))],
        ]);

        $team->pokemons()->sync($request->input('pokemons'));

        return new TeamResource($team->load('pokemons')->refresh());
    }
}
