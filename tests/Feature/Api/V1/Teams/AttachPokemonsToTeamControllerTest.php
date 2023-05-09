<?php

use App\Http\Controllers\Api\V1\Teams\AttachPokemonsToTeamController;
use App\Models\Pokemon;
use App\Models\Team;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

it('can attach pokemons to an existing team', function (){
    Sanctum::actingAs(User::factory()->create());

    $team = Team::factory()->create();

    $pokemons = Pokemon::factory(10)->create();

    $this
        ->post(action(AttachPokemonsToTeamController::class, $team), ['pokemons' => $pokemons->pluck('id')->toArray()])
        ->assertSuccessful();

    $this->assertEquals(
        $pokemons->pluck('id')->toArray(),
        $team->fresh()->pokemons->pluck('id')->toArray()
    );
});
