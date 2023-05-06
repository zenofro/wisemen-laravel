<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pokemon extends Model
{
    protected $guarded = ['id'];

    public function sprites(): HasMany
    {
        return $this->hasMany(PokemonSprite::class);
    }

    public function types(): HasMany
    {
        return $this->hasMany(PokemonType::class);
    }

    public function stats(): HasMany
    {
        return $this->hasMany(PokemonStat::class);
    }

    public function abilities(): HasMany
    {
        return $this->hasMany(PokemonAbility::class);
    }

    public function moves(): HasMany
    {
        return $this->hasMany(PokemonMove::class);
    }
}
