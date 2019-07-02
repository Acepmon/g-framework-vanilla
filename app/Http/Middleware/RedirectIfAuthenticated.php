<?php

namespace App\Http\Middleware;

use App\User;
use App\Group;
use App\Config;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $path = '/home';

            if (Auth::user()->groups->contains(Group::find(1))) {
                $path = Config::getValue('system.auth.adminRedirectPath');
            } else if (Auth::user()->groups->contains(Group::find(2))) {
                $path = Config::getValue('system.auth.operatorRedirectPath');
            } else if (Auth::user()->groups->contains(Group::find(3))) {
                $path = Config::getValue('system.auth.memberRedirectPath');
            } else {
                $path = Config::getValue('system.auth.guestRedirectPath');
            }

            return redirect($path);
        }

        return $next($request);
    }
}
