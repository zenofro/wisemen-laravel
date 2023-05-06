<?php

namespace App\Console\Commands;

use App\Actions\CreatePokemonFromExternalData;
use App\Models\Pokemon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class PokemonImportCommand extends Command
{
    protected $signature = 'pokemon:import {input}';

    protected $description = 'Import a pokémon by name or ID';

    public function handle(CreatePokemonFromExternalData $createPokemonFromExternalData): void
    {
        $input = strtolower(trim($this->argument('input')));

        $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$input}");

        if ($response->notFound()){
            $this->error("Pokémon not found");
            return;
        }

        if (! $response->successful()){
            ray($response->body());
            $this->error("Something went wrong");
            return;
        }

        $data = $response->collect();

        if ($p = Pokemon::firstWhere('name', '=', $data['name'])){
            $this->warn("Pokémon with name {$p->name} already exists");
            return;
        }

        $pokemon = $createPokemonFromExternalData->execute($data->toArray());

        $this->info("Successfully imported pokémon {$pokemon->name}");
    }
}
