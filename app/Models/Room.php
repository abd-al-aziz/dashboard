<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    protected $fillable = [
        
        'name',
        'type',
        'description',
        'price_per_night',
        'is_available',
    ];

}
