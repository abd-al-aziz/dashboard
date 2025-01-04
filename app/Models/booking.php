<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pet_id',
        'room_id',
        'start_date',
        'end_date',
        'total_price',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,"user_id");
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class,"pet_id");
    }

    public function room()
    {
        return $this->belongsTo(Room::class,"room_id");
    }
    public function getStatusColorAttribute() {
        return [
            'confirmed' => 'green',
            'pending' => 'yellow',
            'cancelled' => 'red',
            'completed' => 'blue'
        ][$this->status] ?? 'gray';
    }
}
