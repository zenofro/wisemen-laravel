<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    protected $guarded = ['id'];

    public function pokemons(): BelongsToMany
    {
        return $this->belongsToMany(Pokemon::class);
    }
}
