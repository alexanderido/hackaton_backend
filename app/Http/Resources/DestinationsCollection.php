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
                'description' => $destination->description,
                'location' => $destination->location,
                'address' => $destination->address,
                'phone_number' => $destination->phone_number,
                'cover' => $destination->cover,
                'logo' => $destination->logo,
                'city' => $destination->city,
                'country' => $destination->country,
                'state' => $destination->state,
                'type' => $destination->type,
                'category' => $destination->category,
                'status' => $destination->status,
                'age_restriction' => $destination->age_restriction,
            ];
        })->toArray();
    }
}
