<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
