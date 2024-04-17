<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripRequestMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_request_id',
        'destination',
        'arrival_date',
        'departure_date',
    ];


    public function tripRequest()
    {
        return $this->belongsTo(TripRequest::class);
    }
}
