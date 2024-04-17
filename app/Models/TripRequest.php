<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'adults',
        'children',
        'pets',
        'origin',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tripRequestMeta()
    {
        return $this->hasMany(TripRequestMeta::class);
    }
}
