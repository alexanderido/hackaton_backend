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
            'tags' => $tags,
        ];
    }
}