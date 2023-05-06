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

    public function stats(): HasMany
    {
        return $this->hasMany(Stat::class);
    }

    public function abilities(): HasMany
    {
        return $this->hasMany(Ability::class);
    }

    public function moves(): HasMany
    {
        return $this->hasMany(Move::class);
    }
}
