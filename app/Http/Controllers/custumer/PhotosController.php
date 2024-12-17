<?php

namespace App\Http\Controllers\custumer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function index(){
        return view('custumer.photo-gallery');
    }
}
