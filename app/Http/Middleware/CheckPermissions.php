<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Support\Facades\Log;

class CheckPermissions
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
        // If user is not logged in  send them to login page
        $user = $request->user()?$request->user():Auth::user();
        if (!$user)
        {
            return $next($request);
        }

        $whitelist = config('car.whitelist');
        $permission_title = $this->generatePermissionTitle($request->route()->getName());
        if (is_array($whitelist) && in_array($permission_title, $whitelist)) {
            return $next($request);
        }

        // Check individual id: used in read, update and delete.
        $id = $request->route()->parameters();
        if ($id)
        {
            $id = array_pop($id);
            if ($id) {
                if ($user->hasPermission($permission_title . '_' . $id))
                {
                    $permission_title = $permission_title . '_' . $id;
                } else if ($user->permissionGranted($permission_title)){
                    return $next($request);
                }
            }
        }

        // Handle permission
        if ($user->permissionGranted($permission_title))
        {
            return $next($request);
        }
        Log::warning('User ' . $user->username . '[' . $user->id . '] tried to access permission `' . $permission_title . '` but was denied.');
        return abort('403', 'Requested permission `' . $permission_title . '` is not granted on this user.');
    }

    public function generatePermissionTitle($input)
    {
        $permission_title = str_replace('.', '_', $input);
        $permission_title = str_replace('index', 'read', $permission_title);
        $permission_title = str_replace('show', 'read', $permission_title);
        $permission_title = str_replace('store', 'create', $permission_title);
        $permission_title = str_replace('edit', 'update', $permission_title);
        $permission_title = str_replace('destroy', 'delete', $permission_title);
        return $permission_title;
    }
}
