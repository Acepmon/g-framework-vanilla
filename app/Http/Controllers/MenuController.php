<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('menus.menu', ['menus' => $menus]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('menus.menuCreate', ['menus' => $menus]);
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
            'name' => 'required|max:100',
            'url' => 'required|unique:menus|max:250',
            'parent_id' => 'nullable|integer|exists:menus,id',
            'published' => 'boolean',
        ]);
        $menu = new Menu();

        $menu->type = $request->type;
        $menu->name = $request->name;
        $menu->url = $request->url;
        $menu->parent_id = $request->parent_id;
        if($request->published == 1){
            $menu->published = 1;
        }
        else{
            $menu->published = 0;
        }

        $menu->save();
        return redirect() -> route('menus.index')->with('status', 'Success');
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
        return view('menus.menuShow', ['menu' => $menu]);
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
        return view('menus.menuEdit', ['menu' => $menu, 'menus' => $menus]);
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
            'name' => 'required|max:100',
            'url' => 'required|unique:menus|max:250',
            // 'url' => 'required|max:250',
            'parent_id' => 'nullable|integer|exists:menus,id',
            'published' => 'boolean',
        ]);

        $menu = Menu::findOrFail($id);

        $menu->type = $request->type;
        $menu->name = $request->name;
        $menu->url = $request->url;
        $menu->parent_id = $request->parent_id;

        // $menu->published = $request->published;

        // $menu->save();
        if($request->published == 1){
            $menu->published = 1;
        }
        else{
            $menu->published = 0;
        }
        $menu->save();
        return redirect() -> route('menus.edit', ['id' => $menu->id])->with('status', 'Success');
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
//        return redirect() -> route('menus.index')->with('status', 'Success');
        return redirect()->route('menus.index');
        // 
    }
}