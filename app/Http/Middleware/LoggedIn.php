<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class LoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Mengambil status dari session
        $loginStatus = Session::get('loginStatus');

        // Jika $loginStatus false
        if ($loginStatus == False || !$loginStatus) {
            return redirect()->route('loginadmin');
        }
    
        return $next($request);
    }
}
