<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PermissionCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permissions)
    {
        // Check if the user is authenticated
        if (! Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to log in first.');
        }

        $user_permissions = Cache::get('user_permissions' . Auth::user()->id) ?? [];
        if ((Auth::check() && in_array($permissions, $user_permissions)) || in_array(Auth::user()?->role, [User::$SUPER_ADMIN, User::$IN_CHARGE])) {
            return $next($request);
        }


        return redirect()->route('dashboard')->with('error', 'You do not have permission to access this resource.');
    }
}
