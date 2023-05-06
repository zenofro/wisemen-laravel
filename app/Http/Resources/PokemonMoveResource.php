<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\PokemonMove */
class PokemonMoveResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'move' => $this->move,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'pokemon' => new PokemonResource($this->whenLoaded('pokemon')),
            'versions' => PokemonMoveVersionResource::collection($this->whenLoaded('move')),
        ];
    }
}
