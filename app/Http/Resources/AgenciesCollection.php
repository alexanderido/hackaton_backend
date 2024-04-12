<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AgenciesCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->map(function ($agency) {
            return [
                'id' => $agency->id,
                'name' => $agency->name,
                'logo' => $agency->logo,
                'cover' => $agency->cover,

            ];
        })->toArray();
    }
}
