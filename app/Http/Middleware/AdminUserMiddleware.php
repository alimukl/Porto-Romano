<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
Use Auth;

class AdminUserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            return $next($request);
        } else {
            Auth::logout();
            return redirect(url(''))->with('error', 'Unauthorized access. Please log in.');
        }
    }

}
