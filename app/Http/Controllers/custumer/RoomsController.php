<?php

namespace App\Http\Controllers\custumer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomsController extends Controller 
{
    public function index()
    {
        $rooms = Room::all(); // سيجلب كل الغرف بغض النظر عن حالتها
        
        return view('custumer.room', compact('rooms'));
    }
}