<?php

use App\Http\Controllers\Api\V1\Teams\IndexTeamController;
use App\Models\Team;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

it('can get all teams', function (){
    Sanctum::actingAs(User::factory()->create());

    $teams = Team::factory(10)->create();

    $response = $this->get(action(IndexTeamController::class))
        ->assertOk()
        ->getContent();

    $teamsFromResponse = json_decode($response, true)['data'];

    $this->assertEquals($teams->count(), count($teamsFromResponse));
});
