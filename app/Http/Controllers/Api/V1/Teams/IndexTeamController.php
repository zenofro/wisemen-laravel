<?php

namespace App\Http\Controllers\Api\V1\Teams;

use App\Http\Resources\TeamCollection;
use App\Models\Team;

class IndexTeamController
{
    public function __invoke()
    {
        $teams = Team::with(['pokemons'])->get();

        return new TeamCollection($teams);
    }
}
