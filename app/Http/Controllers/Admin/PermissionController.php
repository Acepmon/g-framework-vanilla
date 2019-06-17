<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use App\User;
use Illuminate\Support\Facades\Validator;
//use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $permissions = Permission::all();
        return view('admin.permissions.index', ['permissions' => $permissions]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.permissions.create', ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $request->validate([
            'title' => 'required|max:191',
            'description' => 'required|max:255',
        ]);
        $permission = new Permission();

        $permission->title = $request->title;
        $permission->description = $request->description;

        $permission->save();
        return redirect()->route('admin.permissions.index')->with('status', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::find($id);
        return view('admin.permissions.show', ['permission' => $permission]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $permissions = Permission::all();

        $permission = Permission::find($id);
        $users = User::all();
        return view('admin.permissions.edit', ['permission' => $permission, 'permissions' => $permissions, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:191',
            'description' => 'required|max:255',
        ]);

        $permission = Permission::findOrFail($id);

        $permission->title = $request->title;
        $permission->description = $request->description;
        $permission->save();

        return redirect()->route('admin.permissions.edit', ['id' => $permission->id])->with('status', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::destroy($id);
        return redirect()->route('admin.permissions.index');
        //
    }
}
