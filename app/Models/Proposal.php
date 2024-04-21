<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_request_id',
        'profile_id',
        'status',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function tripRequest()
    {
        return $this->belongsTo(TripRequest::class);
    }

    public function proposalMeta()
    {
        return $this->hasMany(ProposalMeta::class);
    }
}
