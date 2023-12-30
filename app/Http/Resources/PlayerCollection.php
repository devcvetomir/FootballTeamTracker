<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PlayerCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'Name' => $this->name,
            'Goals' => $this->goals_season,
            'Position' => $this->position,
            'Age' => $this->age,
        ];

        if ($this->team) {
            $data['Team'] = [
                'Name' => $this->team->name,
            ];
        } else {
            $data['Team'] = 'No Team';
        }


        return $data;
    }
}
