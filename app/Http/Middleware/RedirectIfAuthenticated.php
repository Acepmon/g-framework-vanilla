<?php

namespace App\Http\Middleware;

use Modules\System\Entities\User;
use Modules\System\Entities\Group;
use Modules\System\Entities\Config;
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
                $path = config('system.auth.adminRedirectPath');
            } else if (Auth::user()->is_operator()) {
                $path = config('system.auth.operatorRedirectPath');
            } else if (Auth::user()->is_member()) {
                $path = config('system.auth.memberRedirectPath');
            } else {
                $path = config('system.auth.guestRedirectPath');
            }

            return redirect($path);
        }

        return $next($request);
    }
}
