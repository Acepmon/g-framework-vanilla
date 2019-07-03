<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;

class CheckSystemInstallation
{
    protected $except = [
        'install',
        'update',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!file_exists(storage_path('installed'))) {
            if (!Str::startsWith($request->path(), 'install') && !Str::startsWith($request->path(), 'update')) {
                return redirect('install');
            }
        }

        return $next($request);
    }
}
