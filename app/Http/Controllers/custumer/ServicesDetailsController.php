<?php

namespace App\Http\Controllers\custumer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesDetailsController extends Controller
{
    public function index(){
        return view('custumer.services-Details');
    }
}
