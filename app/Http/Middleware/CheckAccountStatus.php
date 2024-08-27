<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAccountStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $status): Response
    {
        if (!$request->user()) {
            return redirect()->intended(route('login', absolute: false));
        }
        if (!$request->user()->hasAccountStatus($status)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
