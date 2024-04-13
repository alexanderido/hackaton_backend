<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DestinationsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     *@return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->map(function ($destination) {
            return [
                'id' => $destination->id,
                'name' => $destination->name,
                'cover' => $destination->cover,
                'logo' => $destination->logo,
                'type' => $destination->type,
                'category' => $destination->category,
                'age_restriction' => $destination->age_restriction,

            ];
        })->toArray();
    }
}
