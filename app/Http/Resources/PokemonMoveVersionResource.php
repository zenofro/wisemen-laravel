<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\PokemonMoveVersion */
class PokemonMoveVersionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'pokemon_move_id' => $this->pokemon_move_id,
            'move_learn_method' => $this->move_learn_method,
            'version_group' => $this->version_group,
            'level_learned_at' => $this->level_learned_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'move' => new PokemonMoveResource($this->whenLoaded('move')),
        ];
    }
}
