<?php

namespace App\Http\Controllers\Admin;

use Route;
use App\Permission;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserPermissionController extends Controller
{
    //
    public function index()
    {
        $user = User::findOrFail(Route::current()->parameter('user'));
        return view('admin.users.permissions.index', ['user' => $user]);
    }

    public function create()
    {
        $user = User::findOrFail(Route::current()->parameter('user'));
        return view('admin.users.permissions.create', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:191',
            'description' => 'max:255'
        ]);
        try {
            $user_id = Route::current()->parameter('user');
            $user = User::findOrFail($user_id);
            $permission = new Permission();
            $permission->title = $request->input('title');
            $permission->description = $request->input('description');
            $permission->save();
            $user->permissions()->attach($permission);

            return redirect()->route('admin.users.permissions.index', ['user' => $user]);
        } catch (\Exception $e) {
            $user = User::findOrFail($user_id);
            return redirect()->route('admin.users.permissions.create', ['user' => $user])->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail(Route::current()->parameter('permission'));
        $user = User::findOrFail(Route::current()->parameter('user'));
        return view('admin.users.permissions.edit', ['user' => $user, 'permission' => $permission]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:191',
            'description' => 'max:255'
        ]);
        $permission = Permission::findOrFail(Route::current()->parameter('permission'));
        $user_id = Route::current()->parameter('user');
        try{
            $permission->title = $request->input('title');
            $permission->description = $request->input('description');
            $permission->save();
            $user = User::findOrFail($user_id);
            return redirect()->route('admin.users.permissions.index', ['user' => $user]);
        } catch (\Exception $e) {
            $user = User::findOrFail($user_id);
            return redirect()->route('admin.users.permissions.edit', ['user' => $user, 'permission' => $permission])->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail(Route::current()->parameter('permission'));
        $user = User::findOrFail(Route::current()->parameter('user'));
        $user->permissions()->detach($permission);
        return redirect()->route('admin.users.permissions.index', ['user' => $user]);
    }
}
