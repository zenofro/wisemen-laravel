<?php

use App\Models\Pokemon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pokemon_sprites', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pokemon::class)->constrained()->cascadeOnDelete();
            $table->string('front_default')->nullable();
            $table->string('front_shiny')->nullable();
            $table->string('front_female')->nullable();
            $table->string('front_shiny_female')->nullable();
            $table->string('back_default')->nullable();
            $table->string('back_shiny')->nullable();
            $table->string('back_female')->nullable();
            $table->string('back_shiny_female')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sprites');
    }
};
