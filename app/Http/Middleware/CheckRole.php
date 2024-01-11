<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // or return an unauthorized response
        }

        foreach ($roles as $role) {
            if (Auth::user()->role->pavadinimas ===$role) {
                return $next($request);
            }
        }

        return redirect()->route('knygos')->with('error', 'Čia negalima!');
    }
}
