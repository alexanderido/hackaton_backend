<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GuestResource extends JsonResource
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
                'icon' => $tag->icon,
            ];
        });

        return [
            'id' => $this->id,
            'profile_id' => $this->profile_id,
            'name' => $this->name,
            'nationality' => $this->nationality,
            'date_of_birth' => $this->date_of_birth,
            'tags' => $tags
        ];
    }
}
