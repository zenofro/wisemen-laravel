<?php

use App\Models\Pokemon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pokemon_moves', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pokemon::class)->constrained()->cascadeOnDelete();
            $table->string('move');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('moves');
    }
};
