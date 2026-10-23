<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() || $request->user()->role != 1) {
            abort(403, 'Nincs jogosultságod az oldal megtekintéséhez.');
        }

        return $next($request);
    }
}
