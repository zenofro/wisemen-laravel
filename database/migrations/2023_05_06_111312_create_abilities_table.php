<?php

use App\Models\Pokemon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('abilities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pokemon::class)->constrained()->cascadeOnDelete();
            $table->boolean('is_hidden');
            $table->integer('slot');
            $table->string('ability');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('abilities');
    }
};
