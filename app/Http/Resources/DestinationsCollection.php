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
            $price = $destination->prices->where('start_date', '<=', date('Y-m-d'))
                ->where('end_date', '>=', date('Y-m-d'))
                ->first();


            return [
                'id' => $destination->id,
                'name' => $destination->name,
                'cover' => $destination->cover,
                'logo' => $destination->logo,
                'type' => $destination->type,
                'category' => $destination->category,
                'price' => $price,
                'country' => $destination->country,
                'city' => $destination->city,
                'age_restriction' => $destination->age_restriction,

            ];
        })->toArray();
    }
}
