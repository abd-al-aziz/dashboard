<?php

namespace App\Http\Controllers\custumer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adoption;

class AdoptionsController extends Controller
{
    public function index()
    {
        // Fetch all adoptions from the database
        $adoptions = Adoption::all();

        // Pass the data to the view
        return view('custumer.adoptions', compact('adoptions'));
    }
}
