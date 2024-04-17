<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'proposal_id',
        'destination',
        'arrival_date',
        'departure_date',
    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }

    public function destinations()
    {
        return $this->belongsToMany(Destination::class);
    }
}
