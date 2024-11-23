<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        return view('admin.dashboard'); // تأكد من وجود الملف dashboard.blade.php في المجلد admin
    }
}
