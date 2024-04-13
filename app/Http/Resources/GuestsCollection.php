<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GuestsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->map(function ($guest) {
            return [
                'id' => $guest->id,
                'profile_id' => $guest->profile_id,
                'name' => $guest->name,
                'nationality' => $guest->nationality,
                'date_of_birth' => $guest->date_of_birth,
            ];
        })->toArray();
    }
}
