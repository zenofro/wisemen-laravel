<?php

namespace App\Actions;

use App\Models\Pokemon;

class CreatePokemonFromExternalData
{
    public function execute(array $data): Pokemon
    {
        $pokemon = Pokemon::create([
            'name' => $data['name'],
            'height' => $data['height'],
            'weight' => $data['weight'],
            'species' => data_get($data, 'species.name'),
            'order' => $data['order'],
            'form' => data_get($data, 'forms.0.name'),
        ]);

        foreach ($data['abilities'] as $ability) {
            $pokemon->abilities()->create([
                'slot' => $ability['slot'],
                'is_hidden' => $ability['is_hidden'],
                'ability' => data_get($ability, 'ability.name'),
            ]);
        }

        foreach ($data['moves'] as $move) {
            $pokemon->moves()->create([
                'move' => data_get($move, 'move.name'),
            ]);
        }

        $pokemon->sprite()->create([
            'back_default' => $data['sprites']['back_default'],
            'back_female' => $data['sprites']['back_female'],
            'back_shiny' => $data['sprites']['back_shiny'],
            'back_shiny_female' => $data['sprites']['back_shiny_female'],
            'front_default' => $data['sprites']['front_default'],
            'front_female' => $data['sprites']['front_female'],
            'front_shiny' => $data['sprites']['front_shiny'],
            'front_shiny_female' => $data['sprites']['front_shiny_female'],
        ]);

        foreach ($data['stats'] as $stat) {
            $pokemon->stats()->create([
                'base_stat' => $stat['base_stat'],
                'stat' => data_get($stat, 'stat.name'),
                'effort' => $stat['effort'],
            ]);
        }

        foreach ($data['types'] as $type) {
            $pokemon->types()->create([
                'slot' => $type['slot'],
                'type' => data_get($type, 'type.name'),
            ]);
        }

        return $pokemon->refresh();
    }
}
