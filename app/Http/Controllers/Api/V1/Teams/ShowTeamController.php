<?php

namespace App\Http\Controllers\Api\V1\Teams;

use App\Http\Resources\TeamResource;
use App\Models\Team;

class ShowTeamController
{
    public function __invoke(Team $team)
    {
        return new TeamResource($team->load('pokemons'));
    }
}
