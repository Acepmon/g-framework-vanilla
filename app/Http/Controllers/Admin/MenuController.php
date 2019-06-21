<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', ['menus' => $menus]);
    }

    public function subtree($id)
    {
        $output = [];
        $menus = Menu::where('parent_id', $id)->orderBy('order', 'asc')->get();
        foreach($menus as $key => $value)
        {
            $menu = (object)[];
            $menu->id = $value["id"];
            $menu->title = $value["title"];
            $menu->type = $value["type"];
            $menu->subtitle = $value["subtitle"];
            $menu->link = $value["link"];
            $menu->icon = $value["icon"];
            $menu->status = $value["status"];
            $menu->visibility = $value["visibility"];
            $menu->statusClass = $value->statusClass();
            $menu->visibilityIcon = $value->visibilityIcon();

            $menu->children = $this->subtree($value["id"]);

            $output[$key] = $menu;
        }
        return $output;
    }

    public function tree()
    {
        $output = $this->subtree(NULL);
        return response()->json($output);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('admin.menus.create', ['menus' => $menus]);
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
            'type' => 'required|in:admin,car,tour,default',
            'title' => 'required|max:191',
            'subtitle' => 'nullable|max:255',
            'link' => 'nullable|max:255',
            'icon' => 'nullable|max:50',
            'status' => 'required|max:50',
            'visibility' => 'required|max:50',
            'order' => 'required|integer',
            'sublevel' => 'required|integer',
            'parent_id' => 'nullable|integer|exists:menus,id'
        ]);
        $menu = new Menu();

        $menu->type = $request->type;
        $menu->title = $request->title;
        $menu->subtitle = $request->subtitle;
        $menu->link = $request->link;
        $menu->icon = $request->icon;
        $menu->status = $request->status;
        $menu->visibility = $request->visibility;
        $menu->order = $request->order;
        $menu->sublevel = $request->sublevel;
        $menu->parent_id = $request->parent_id;

        $menu->save();
        return redirect()->route('admin.menus.index')->with('status', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::find($id);
        return view('admin.menus.show', ['menu' => $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $menus = Menu::all();

        $menu = Menu::find($id);
        return view('admin.menus.edit', ['menu' => $menu, 'menus' => $menus]);
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
        // $menus = Menu::find($id);
        // $menu = new menu;
        $request->validate([
            'type' => 'required|in:admin,car,tour,default',
            'title' => 'required|max:191',
            'subtitle' => 'nullable|max:255',
            'link' => 'nullable|max:255',
            'icon' => 'nullable|max:50',
            'status' => 'required|max:50',
            'visibility' => 'required|max:50',
            'order' => 'required|integer',
            'sublevel' => 'required|integer',
            'parent_id' => 'nullable|integer|exists:menus,id'
        ]);

        $menu = Menu::findOrFail($id);

        $menu->type = $request->type;
        $menu->title = $request->title;
        $menu->subtitle = $request->subtitle;
        $menu->link = $request->link;
        $menu->icon = $request->icon;
        $menu->status = $request->status;
        $menu->visibility = $request->visibility;
        $menu->order = $request->order;
        $menu->sublevel = $request->sublevel;
        $menu->parent_id = $request->parent_id;

        // $menu->published = $request->published;

        // $menu->save();
        $menu->save();
        return redirect()->route('admin.menus.edit', ['id' => $menu->id])->with('status', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $menu = Menu::find($id);
        // $menu->delete();

        Menu::destroy($id);
//        return redirect()->route('admin.menus.index')->with('status', 'Success');
        return redirect()->route('admin.menus.index');
        //
    }
}
