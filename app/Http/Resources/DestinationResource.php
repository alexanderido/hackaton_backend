<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DestinationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $tags = $this->tags->map(function ($tag) {
            return [
                'id' => $tag->id,
                'name' => $tag->name,
            ];
        });

        $price = $this->prices->where('start_date', '<=', date('Y-m-d'))
            ->where('end_date', '>=', date('Y-m-d'))
            ->first();

        $gallery = $this->galleries->map(function ($gallery) {
            return [
                $gallery->image
            ];
        });
        return [
            'id' => $this->id,
            'agency_id' => $this->agency_id,
            'agency_name' => $this->agency->name,
            'name' => $this->name,
            'description' => $this->description,
            'location' => $this->location,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'cover' => $this->cover,
            'logo' => $this->logo,
            'city' => $this->city,
            'country' => $this->country,
            'state' => $this->state,
            'type' => $this->type,
            'category' => $this->category,
            'status' => $this->status,
            'age_restriction' => $this->age_restriction,
            'price' => $price->price,
            'current_date' => date('Y-m-d'),
            'gallery' => $gallery,
            'tags' => $tags,
        ];
    }
}
