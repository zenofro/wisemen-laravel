<?php

namespace Database\Factories;

use App\Models\Pokemon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PokemonFactory extends Factory
{
    protected $model = Pokemon::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'height' => $this->faker->randomNumber(),
            'weight' => $this->faker->randomNumber(),
            'order' => $this->faker->randomNumber(),
            'species' => $this->faker->word(),
            'form' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
