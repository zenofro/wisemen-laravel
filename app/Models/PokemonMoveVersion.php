<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PokemonMoveVersion extends Model
{
    protected $guarded = ['id'];

    public function move(): BelongsTo
    {
        return $this->belongsTo(PokemonMove::class);
    }
}
