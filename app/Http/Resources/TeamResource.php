<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       $data = [

            'id' => $this->id,
            'Name' => $this->name,
            'Players' => $this->players->isEmpty() ? [] : PlayerResource::collection($this->players), // ok? TODO sorting?
            'Total Goals' => $this->players->sum('goals_season'),
        ];

       return $data;

    }
}
