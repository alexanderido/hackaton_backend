<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'nationality',
        'date_of_birth',
        'photo',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }

    public function tripRequests()
    {
        return $this->hasMany(TripRequest::class);
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
