<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\GroupMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        // $parent = Group::findOrFail('parent_id');
        return view('admin.groups.index', ['groups' => $groups] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.groups.create');
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
        return view('admin.groups.show', ['group' => $group]);
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
        Group::destroy($id);
        return redirect()->route('admin.groups.index')->with('status', 'Group deleted');
    }
}
