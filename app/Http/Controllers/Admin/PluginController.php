<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Plugin;
//use App\User;
use Illuminate\Support\Facades\Validator;
//use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class PluginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $plugins = Plugin::all();
        return view('admin.plugins.index', ['plugins' => $plugins]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plugins = Plugin::all();
        return view('admin.plugins.create', ['plugins' => $plugins]);
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
           'description' => 'nullable|max:255',
           'repository' => 'required|max:255',
       ]);
        $plugin = new Plugin();

        $plugin->title = $request->title;
        $plugin->description = $request->description;
        $plugin->repository = $request->repository;
        $plugin->version = '1.0.0';
        $plugin->status = Plugin::AVAILABLE;

        $plugin->save();
        return redirect()->route('admin.plugins.index')->with('status', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plugin = Plugin::find($id);
        return view('admin.plugins.show', ['plugin' => $plugin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $plugins = Plugin::all();

        $plugin = Plugin::find($id);
        $users = User::all();
        return view('admin.plugins.edit', ['plugin' => $plugin, 'plugins' => $plugins, 'users' => $users]);
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

        $plugin = Plugin::findOrFail($id);

        $plugin->title = $request->title;
        $plugin->description = $request->description;
        $plugin->save();

        return redirect()->route('admin.plugins.edit', ['id' => $plugin->id])->with('status', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Plugin::destroy($id);
        return redirect()->route('admin.plugins.index');
        //
    }
}
