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
        $user = Auth::user();

        if (!$user) {
            // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang login
            return redirect()->route('login');
        }

        $role = $user->role->name;

        if ($role !== $roleName) {
            // Tránh chuyển hướng đến route hiện tại
            if ($request->routeIs('home')) {
                return redirect()->route('profile.index');
            }
            return redirect()->route('profile.index');
        }

        return $next($request);
    }
}
