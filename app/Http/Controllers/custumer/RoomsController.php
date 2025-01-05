<?php

namespace App\Http\Controllers\custumer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomsController extends Controller 
{
    public function index()
    {
        $rooms = Room::paginate(10);         
        return view('custumer.room', compact('rooms'));
    }
}