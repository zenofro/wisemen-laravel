<?php

namespace App\Http\Controllers\Api\V1\Teams;

use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class StoreTeamController
{
    use ValidatesRequests;

    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
        ]);

        $team = Team::create(['name' => $request->input('name')]);

        return new TeamResource($team->load('pokemons'));
    }
}
