<?php

namespace App\Console\Commands;

use App\Actions\CreatePokemonFromExternalData;
use App\Models\Pokemon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class PokemonSeedCommand extends Command
{
    protected $signature = 'pokemon:seed';

    protected $description = 'Import some pokémons from a seed';

    public function handle(CreatePokemonFromExternalData $createPokemonFromExternalData)
    {
        $pokemonData = json_decode(Storage::get('pokemons.json'), true);

        $count = count($pokemonData);

        $this->info("Found {$count} pokémons to import");

        $bar = $this->output->createProgressBar($count);

        $bar->start();

        foreach ($pokemonData as $data) {
            $createPokemonFromExternalData->execute($data);

            $bar->advance();
        }

        $bar->finish();

        $this->info('Successfully imported all pokémons!');
    }
}
