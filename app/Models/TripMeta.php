<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_id',
        'destination',
        'arrival_date',
        'departure_date',
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function destinations()
    {
        return $this->belongsToMany(Destination::class);
    }
}
