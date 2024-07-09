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
        $role = Auth::user()->role;

        if ($role->name === 'admin') {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('profile.index');
        }
    }
}
