<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Role; // Import model Role

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $roleName
     * @return mixed
     */
    public function handle($request, Closure $next, $roleName)
    {
        if (Auth::check()) {
            $user = Auth::user();

            $role = Role::find($user->role_id);

            if ($role && $role->name === $roleName) {
                return $next($request);
            }
        }
        return redirect('/');
    }
}
