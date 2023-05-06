<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\PokemonSprite */
class PokemonSpriteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'front_default' => $this->front_default,
            'front_shiny' => $this->front_shiny,
            'front_female' => $this->front_female,
            'front_shiny_female' => $this->front_shiny_female,
            'back_default' => $this->back_default,
            'back_shiny' => $this->back_shiny,
            'back_female' => $this->back_female,
            'back_shiny_female' => $this->back_shiny_female,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
