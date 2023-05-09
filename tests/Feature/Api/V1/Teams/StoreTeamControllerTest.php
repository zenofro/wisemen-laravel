<?php

use App\Http\Controllers\Api\V1\Teams\StoreTeamController;
use App\Models\Team;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

it('can create a new team', function (){
    Sanctum::actingAs(User::factory()->create());

    $data = ['name' => 'New team'];

    $json = $this
        ->post(action(StoreTeamController::class), $data)
        ->assertSuccessful()
        ->getContent();


    $this->assertContains('New team', json_decode($json, true)['data']);

    $this->assertDatabaseHas(
        app(Team::class)->getTable(),
        $data
    );
});
