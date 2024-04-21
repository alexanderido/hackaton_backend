<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TripCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {

        return $this->collection->map(function ($trip) {
            $meta = $trip->metas->map(function ($meta) {
                return [
                    'destination' => $meta->destination,
                    'arrival_date' => $meta->arrival_date,
                    'departure_date' => $meta->departure_date,

                ];
            });

            return [
                'id' => $trip->id,
                'status' => $trip->status,
                'status' => $trip->status,
                'origin' => $trip->origin,
                'adults' => $trip->adults,
                'children' => $trip->children,
                'pets' => $trip->pets,
                'meta' => $meta,
            ];
        })->toArray();
    }
}
