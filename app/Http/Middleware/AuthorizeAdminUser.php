<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Modules\System\Entities\Group;
use Modules\System\Entities\Config;

class AuthorizeAdminUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (!Auth::user()->is_admin() && !Auth::user()->is_operator()) {
            abort(404);
        }

        return $next($request);
    }
}
