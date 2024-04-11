<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TagsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->map(function ($tag) {
            return [
                'id' => $tag->id,
                'name' => $tag->name,
                'icon' => $tag->icon,
            ];
        })->toArray();
    }
}
