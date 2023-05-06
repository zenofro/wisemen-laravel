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
            'sprites' => new PokemonSpriteResource($this->whenLoaded('sprite')),
            'abilities' => PokemonAbilityResource::collection($this->whenLoaded('abilities')),
            'moves' => PokemonMoveResource::collection($this->whenLoaded('moves')),
            'stats' => PokemonStatResource::collection($this->whenLoaded('stats')),
            'types' => PokemonTypeResource::collection($this->whenLoaded('types')),
        ];
    }
}
