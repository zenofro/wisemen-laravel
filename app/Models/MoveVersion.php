<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MoveVersion extends Model
{
    protected $guarded = ['id'];

    public function move(): BelongsTo
    {
        return $this->belongsTo(Move::class);
    }
}
