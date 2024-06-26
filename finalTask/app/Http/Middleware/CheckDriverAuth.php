<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckDriverAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated and has the role of 'driver'
        if (!auth()->check() || auth()->user()->user_role !== 'driver') {
            // If not authenticated or not a driver, abort with 403 Forbidden error
            abort(403, 'Unauthorized.');
        }

        // If authenticated and driver role, proceed to the next middleware or route handler
        return $next($request);
    }
}
