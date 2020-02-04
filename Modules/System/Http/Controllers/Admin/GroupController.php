<?php

namespace Modules\System\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\System\Entities\Group;
use App\Menu;
use Modules\System\Entities\User;
use App\Permission;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systemGroups = Group::where('type', Group::TYPE_SYSTEM)->get();
        $staticGroups = Group::where('type', Group::TYPE_STATIC)->get();
        $dynamicGroups = Group::where('type', Group::TYPE_DYNAMIC)->get();

        return view('admin.groups.index', ['systemGroups' => $systemGroups, 'staticGroups' => $staticGroups, 'dynamicGroups' => $dynamicGroups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        return view('admin.groups.create', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showMenuGroup(Request $request, $id)
    {
        $group = Group::findOrFail($id);
        $menus = Menu::all();

        if (empty($request->input('search')) && empty($request->input('status')) && empty($request->input('visibility'))) {
            $menus = Menu::all();
        } else {
            if (empty($request->input('search'))) {
                if (empty($request->input('visibility'))) {
                    $menus = Menu::where('status', $request->input('status'))->get();
                } else if (empty($request->input('status'))) {
                    $menus = Menu::where('visibility', $request->input('visibility'))->get();
                } else {
                    $menus = Menu::where('visibility', $request->input('visibility'))
                    ->where('status', $request->input("status"))->get();
                }
            } else {
                if (empty($request->input('status'))) {
                    if (empty($request->input('visibility'))) {
                        $menus = Menu::where($request->input('type'), 'LIKE', '%' . $request->input('search') . '%')->get();
                    }else{
                        $menus = Menu::where($request->input('type'), 'LIKE', '%' . $request->input('search') . '%')
                        ->where('visibility', $request->input('visibility'))->get();
                    }
                } else {
                    if (empty($request->input('visibility'))) {
                        $menus = Menu::where($request->input('type'), 'LIKE', '%' . $request->input('search') . '%')
                        ->where('status', $request->input('status'))->get();
                    }else{
                        $menus = Menu::where($request->input('type'), 'LIKE', '%' . $request->input('search') . '%')
                        ->where('visibility', $request->input('visibility'))
                        ->where('status', $request->input('status'))->get();
                    }
                }
            }
        }

        return view('admin.groups.menus.create', ['group' => $group, 'menus' => $menus]);
    }

    public function createMenu($groupid, $menuid)
    {
        $group = Group::findOrFail($groupid);
        $group->menus()->attach($menuid);
        return back()->with('status', 'Menu added.');

        // if (! $group->menus->contains($menuid->id)) {
        //     $group->menus()->attach($menuid);
        //     return back()->with('status', 'Menu added.');
        // }

    }

    public function removeMenu($groupid, $menuid)
    {
        $group = Group::findOrFail($groupid);
        $group->menus()->detach($menuid);

        return back()->with('status', 'Menu removed.');
    }

    public function showUserGroup(Request $request, $id)
    {
        $group = Group::findOrFail($id);

        if (empty($request->input('search')) && empty($request->input('lang'))) {
            $users = User::all();
        } else {
            if (empty($request->input('search'))) {
                $users = User::where('language', $request->input('lang'))->get();
            } else {
                if (empty($request->input('lang'))) {
                    $users = User::where($request->input('type'), 'LIKE', '%' . $request->input('search') . '%')->get();
                } else {
                    $users = User::where($request->input('type'), 'LIKE', '%' . $request->input('search') . '%')
                    ->where('language', $request->input('lang'))->get();
                }
            }
        }

        return view('admin.groups.users.create', ['group' => $group, 'users' => $users]);
    }

    public function createUser($groupid, $userid)
    {
        $group = Group::findOrFail($groupid);
        $group->users()->attach($userid);
        return back()->with('status', 'User added.');


    }

    public function removeUser($groupid, $userid)
    {
        $group = Group::findOrFail($groupid);
        $group->users()->detach($userid);

        return back()->with('status', 'User removed.');
    }

    public function showPermissionGroup(Request $request, $id)
    {
        $group = Group::findOrFail($id);

        if (empty($request->input('search'))) {
            $permissions = Permission::all();
        } else {
            $permissions = Permission::where($request->input('type'), 'LIKE', '%' . $request->input('search') . '%')->get();
        }

        return view('admin.groups.permissions.create', ['group' => $group, 'permissions' => $permissions]);
    }

    public function createPermission($groupid, $permissionid)
    {
        $group = Group::findOrFail($groupid);
        $group->permissions()->attach($permissionid);
        return back()->with('status', 'Permissions added.');


    }

    public function removePermission($groupid, $permissionid)
    {
        $group = Group::findOrFail($groupid);
        $group->permissions()->detach($permissionid);

        return back()->with('status', 'Permissions removed.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|max:100',
        //     'description' => 'nullable|max:250',
        // ]);

        $group = new Group;
        $group->parent_id = $request->parent_id;
        $group->title = $request->title;
        $group->description = $request->description;
        $group->type = Group::TYPE_STATIC;
        $group->save();

        return redirect()->route('admin.groups.index')->with('status', 'Group created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::findOrFail($id);
        $users = User::all();
        $permissions = Permission::all();
        return view('admin.groups.show', ['group' => $group, 'users' => $users, 'permissions' => $permissions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::findOrFail($id);
        return view('admin.groups.edit', ['group' => $group]);
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
        // $validatedData = $request->validate([
        //     'name' => 'required|max:100',
        //     'description' => 'nullable|max:250',
        // ]);

        $group = Group::findOrFail($id);
        $group->parent_id = $request->parent_id;
        $group->title = $request->title;
        $group->description = $request->description;
        $group->save();
        return redirect()->route('admin.groups.index')->with('status', 'Group edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::findOrFail($id);

        if ($group->type == Group::TYPE_SYSTEM) {
            return redirect()->route('admin.groups.index')->with('status', 'System group cannot be deleted!');
        } else {
            $group->delete();
            return redirect()->route('admin.groups.index')->with('status', 'Group deleted');
        }
    }
}
