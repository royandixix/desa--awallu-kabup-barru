<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Pastikan user login dan method isAdmin() ada di User model
        if ($request->user() && $request->user()->isAdmin()) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
