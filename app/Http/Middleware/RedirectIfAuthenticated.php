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

            if (Auth::user()->is_admin()) {
                $path = Config::getValue('system.auth.adminRedirectPath');
            } else if (Auth::user()->is_operator()) {
                $path = Config::getValue('system.auth.operatorRedirectPath');
            } else if (Auth::user()->is_member()) {
                $path = Config::getValue('system.auth.memberRedirectPath');
            } else {
                $path = Config::getValue('system.auth.guestRedirectPath');
            }

            return redirect($path);
        }

        return $next($request);
    }
}
