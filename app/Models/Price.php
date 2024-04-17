<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_id',
        'price',
        'start_date',
        'end_date',
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
