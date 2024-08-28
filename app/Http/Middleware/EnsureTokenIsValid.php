<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureTokenIsValid
{
    public function handle(Request $request, Closure $next)
    {
        // Logika middleware untuk memastikan token valid
        if ($request->bearerToken() !== 'token_yang_valid') {
            return response()->json(['error' => 'Token tidak valid'], 401);
        }

        return $next($request);
    }
}
