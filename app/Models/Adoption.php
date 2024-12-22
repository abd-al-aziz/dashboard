<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    use HasFactory;

    // Define the table name if it differs from the default plural form of the model name
    protected $table = 'adoption';

    // Define the fillable columns to allow mass assignment
    protected $fillable = [
        'user_id', 
        'name', 
        'image', 
        'breed', 
        'age', 
        'color', 
        'personality', 
        'is_adopted'
    ];

    // Optionally, you can define the relationships with other models if needed
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
