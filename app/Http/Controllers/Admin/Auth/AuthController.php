<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Giriş başarılı
            return redirect('/admin/dashboard')->with('success', 'Giriş başarılı.');

        }

        // Giriş başarısız
        return back()->withErrors(['email' => 'Email veya şifre hatalı.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
