<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// ----------------------------------------------------------
// AUTENTIKÁCIÓS RÉSZ – KÉSZÍTETTE: Németh Ildikó
// Feladat: user/admin szerepkörök kezelése
// ----------------------------------------------------------


class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || auth()->user()->role !== 'user') {
            abort(403);
        }

        return $next($request);
    }
}
