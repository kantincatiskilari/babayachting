<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GeneralSettings;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        $entranceImage = GeneralSettings::select('entrance_image')->first();

        return view('admin.auth.login', compact('entranceImage'));
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
