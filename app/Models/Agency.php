<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', // 'user_id' is the foreign key that links the agency to the user
        'name',
        'name_juridical',
        'cover',
        'bio',
        'logo',
        'cedula',
        'phone_number',
        'address',
        'email',
        'bank_account',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }
}
