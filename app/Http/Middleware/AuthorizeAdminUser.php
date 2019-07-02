<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Group;
use App\Config;

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

        if (!Auth::user()->groups->contains(Group::find(1))) {
            abort(404);
        }

        return $next($request);
    }
}
