<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin-login'); // إنشاء هذا العرض لاحقًا
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::guard('admin')->attempt($credentials)) {
        $request->session()->regenerate(); // تجديد الجلسة بعد تسجيل الدخول
        return redirect()->route('admin.dashboard');
    }

    return back()->withErrors([
        'email' => 'Invalid credentials.',
    ])->withInput($request->except('password'));
}
}

