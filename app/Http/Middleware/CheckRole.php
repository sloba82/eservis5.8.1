<?php

namespace App\Http\Middleware;

use Closure;
use App\UserRole;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $user = $request->user();
        $role = UserRole::find($user->role);

        if (in_array($role->name, $roles)) {
            return $next($request);
        } else {
            return redirect('home');
        }
    }
}
