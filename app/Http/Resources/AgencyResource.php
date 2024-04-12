<?php

namespace App\Http\Resources;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AgencyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $destination = Destination::where('agency_id', $this->id)->get();

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'name_juridical' => $this->name_juridical,
            'cedula' => $this->cedula,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'email' => $this->email,
            'bank_account' => $this->bank_account,
            'bio' => $this->bio,
            'cover' => $this->cover,
            'logo' => $this->logo,
            'destinations' => DestinationResource::collection($destination),


        ];
    }
}
