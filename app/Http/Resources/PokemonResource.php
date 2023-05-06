<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Pokemon */
class PokemonResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'height' => $this->height,
            'weight' => $this->weight,
            'order' => $this->order,
            'species' => $this->species,
            'form' => $this->form,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'abilities_count' => $this->abilities_count,
            'moves_count' => $this->moves_count,
            'stats_count' => $this->stats_count,
            'types_count' => $this->types_count,
        ];
    }
}
