<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\PokemonStat */
class PokemonStatResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'stat' => $this->stat,
            'effort' => $this->effort,
            'base_stat' => $this->base_stat,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'pokemon' => new PokemonResource($this->whenLoaded('pokemon')),
        ];
    }
}
