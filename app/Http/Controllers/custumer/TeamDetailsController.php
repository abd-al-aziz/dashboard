<?php

namespace App\Http\Controllers\custumer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamDetailsController extends Controller
{
    public function index(){
        return view('custumer.team-details');
    }

}
