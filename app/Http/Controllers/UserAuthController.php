<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{

    // public function showLoginForm()
    // {
    //     return view('/login');
    // }

    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if (Auth::guard('web')->attempt($credentials)) {
    //         $request->session()->regenerate();
    //         return redirect()->intended('/home');
    //     }

    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',

    //     ]);
    // }
}
