<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

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

        $permission_title = $this->generatePermissionTitle($request->route()->getName());

        // Check individual id: used in read, update and delete.
        $id = $request->route()->parameters();
        if ($id)
        {
            $id = array_pop($id);
            if ($id) {
                // $permission_title = $permission_title . '_' . $id;
                if ($user->hasPermission($permission_title . '_' . $id))
                {
                    return $next($request);
                }   
            }
        }

        // Handle permission
        if ($user->hasPermission($permission_title))
        {
            return $next($request);
        }
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
