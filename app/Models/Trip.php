<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'proposal_id',
        'trip_request_id',
        'adults',
        'children',
        'pets',
        'origin',
        'status',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }

    public function tripRequest()
    {
        return $this->belongsTo(TripRequest::class);
    }

    public function metas()
    {
        return $this->hasMany(TripMeta::class);
    }
}
