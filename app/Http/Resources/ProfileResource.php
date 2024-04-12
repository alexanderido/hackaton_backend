<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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

        //get the guests by user_id
        $guests = $this->guests->map(function ($guest) {
            return GuestResource::make($guest);
        });


        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'nationality' => $this->nationality,
            'date_of_birth' => $this->date_of_birth,
            'photo' => $this->photo,
            'tags' => $tags,
            'guests' => $guests


        ];
    }
}
