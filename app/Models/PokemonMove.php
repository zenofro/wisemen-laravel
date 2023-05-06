<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PokemonMove extends Model
{
    protected $guarded = ['id'];

    public function pokemon(): BelongsTo
    {
        return $this->belongsTo(Pokemon::class);
    }

    public function versions(): HasMany
    {
        return $this->hasMany(PokemonMoveVersion::class);
    }
}
