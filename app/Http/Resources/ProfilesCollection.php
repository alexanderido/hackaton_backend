<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProfilesCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->map(function ($profile) {
            return [
                'id' => $profile->id,
                'name' => $profile->name,
                'nationality' => $profile->nationality,
                'date_of_birth' => $profile->date_of_birth,
                'photo' => $profile->photo,
            ];
        })->toArray();
    }
}
