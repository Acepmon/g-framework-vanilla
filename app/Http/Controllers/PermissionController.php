<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $permissons = Permisson::all();
        return view('permissons.permisson', ['permissons' => $permissons]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissons = Permisson::all();
        return view('permissons.permissonCreate', ['permissons' => $permissons]);
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
            'published' => 'boolean',
        ]);
        $permisson = new Permisson();

        $permisson->type = $request->type;
        $permisson->name = $request->name;
        $permisson->url = $request->url;
        $permisson->parent_id = $request->parent_id;
        if($request->published == 1){
            $permisson->published = 1;
        }
        else{
            $permisson->published = 0;
        }

        $permisson->save();
        return redirect() -> route('permissons.index')->with('status', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permisson = Permisson::find($id);
        return view('permissons.permissonShow', ['permisson' => $permisson]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $permissons = Permisson::all();

        $permisson = Permisson::find($id);
        return view('permissons.permissonEdit', ['permisson' => $permisson, 'permissons' => $permissons]);
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
            'type' => 'required|in:admin,car,tour,default',
            'name' => 'required|max:100',
            'published' => 'boolean',
        ]);

        $permisson = Permisson::findOrFail($id);

        $permisson->type = $request->type;
        $permisson->name = $request->name;
        $permisson->url = $request->url;
        $permisson->parent_id = $request->parent_id;       
        
        $permisson->save();
        return redirect() -> route('permissons.edit', ['id' => $permisson->id])->with('status', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permisson::destroy($id);
        return redirect()->route('permissons.index');
        // 
    }
}
