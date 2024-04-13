<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
        'address',
        'phone_number',
        'cover',
        'logo',
        'city',
        'country',
        'state',
        'type',
        'category',
        'status',
        'age_restriction',
        'agency_id',
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
