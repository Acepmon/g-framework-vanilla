<?php

namespace App\Http\Middleware;

use Closure;

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
        $installPrefix = 'install';
        $updatePrefix = 'update';

        if (!file_exists(storage_path('installed')) && substr($request->path(), 0, strlen($installPrefix)) === $installPrefix && substr($request->path(), 0, strlen($updatePrefix)) === $updatePrefix) {
            return redirect('install');
        }

        return $next($request);
    }
}
