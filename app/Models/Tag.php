<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function destination()
    {
        return $this->belongsToMany(Destination::class);
    }

    public function guest()
    {
        return $this->belongsToMany(Guest::class);
    }

    public function profile()
    {
        return $this->belongsToMany(Profile::class);
    }
}
