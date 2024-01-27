<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateUser
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            // Kullanıcı zaten oturum açmışsa, normal işlem devam etsin
            return $next($request);
        }

        return redirect()->route('login'); // Kullanıcı oturum açmamışsa login sayfasına yönlendir
    }
}

