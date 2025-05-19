<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class RoleMiddleware
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle($request, Closure $next, ...$roles)
    {

        $role_session = session('user_roles', []);
        if (Auth::check()) {
        $userRole = Auth::user()->role;
        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        // If role doesn't match, show unauthorized access message
        abort(403, 'Unauthorized access.');
    }

        return redirect('/login')->with('error', 'Unauthorized access.');
    }

}
