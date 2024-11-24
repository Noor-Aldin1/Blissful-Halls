<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLessorRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()) {
            $role_id = Auth::user()->role_id;

            if ($role_id == 2 || $role_id == 3) {
                return $next($request);
            }
        }

        return redirect(route('login'))->with('error', 'You do not have access to this section.');
    }
}
