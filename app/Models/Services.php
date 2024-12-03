<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    public function services()
    {
        return $this->hasMany(Services::class);
    }
    
    protected $fillable =[
    'name',
    'descrption',
    'price',
    'created_at'];
}
