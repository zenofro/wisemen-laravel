<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pokemon extends Model
{
    protected $guarded = ['id'];

    public function sprites(): HasMany
    {
        return $this->hasMany(Sprite::class);
    }

    public function types(): HasMany
    {
        return $this->hasMany(Type::class);
    }
}
