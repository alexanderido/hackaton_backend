<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\DestinationResource;

class TripResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $destinations = $this->metas->map(function ($metas) {
            $destinations = [
                'hotel' => [],
                'restaurant' => [],
                'tour' => []
            ];
            foreach ($metas->destinations as $destination) {

                switch ($destination->type) {
                    case 'hotel':

                        array_push($destinations['hotel'], new DestinationResource($destination));
                        break;
                    case 'restaurant':
                        array_push($destinations['restaurant'],  new DestinationResource($destination));
                        break;
                    case 'tour':
                        array_push($destinations['tour'],  new DestinationResource($destination));
                        break;
                }
            }

            return [
                'id' => $metas->id,
                'destination' => $metas->destination,
                'arrival_date' => $metas->arrival_date,
                'departure_date' => $metas->departure_date,
                'destinations' => $destinations
            ];
        });

        return [
            'id' => $this->id,
            'status' => $this->status,
            'origin' => $this->origin,
            'adults' => $this->adults,
            'children' => $this->children,
            'pets' => $this->pets,
            'destinations' => $destinations,




        ];
    }
}
