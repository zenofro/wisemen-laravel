<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pokemon extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function sprite(): HasOne
    {
        return $this->HasOne(PokemonSprite::class);
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

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class);
    }
}
