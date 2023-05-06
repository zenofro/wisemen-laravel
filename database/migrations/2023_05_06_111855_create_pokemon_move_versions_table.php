<?php

use App\Models\PokemonMove;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pokemon_move_versions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(PokemonMove::class)->constrained()->cascadeOnDelete();
            $table->string('move_learn_method');
            $table->string('version_group');
            $table->integer('level_learned_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('move_versions');
    }
};
