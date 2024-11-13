<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckFormAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Example: Check if the user is authenticated
        if (!Auth::check()) {
            // Redirect to login if the user is not authenticated
            return redirect()->route('login');
        }

        // Continue to the requested route
        return $next($request);
    }
}
