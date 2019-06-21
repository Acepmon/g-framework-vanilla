<?php

namespace App\Http\Controllers\Admin;

use App\Backup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $backups = Backup::all();
        return view('admin.backups.index', ['$backups' => $backups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.backups.create');
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

        $backups = new Backup;
        $backups->parent_id = $request->parent_id;
        $backups->title = $request->title;
        $backups->description = $request->description;
        $backups->type = Backup::TYPE_STATIC;
        $backups->save();

        return redirect()->route('admin.backups.index')->with('status', 'Backup created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $backups = Backup::findOrFail($id);
        return view('admin.backups.show', ['backups' => $backups]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $backups = Backup::findOrFail($id);
        return view('admin.backups.edit', ['backups' => $backups]);
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

        $backups = Backup::findOrFail($id);
        $backups->parent_id = $request->parent_id;
        $backups->title = $request->title;
        $backups->description = $request->description;
        $backups->save();
        return redirect()->route('admin.backups.index')->with('status', 'Backup edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $backups = Backup::findOrFail($id);

        if ($backups->type == Backup::TYPE_SYSTEM) {
            return redirect()->route('admin.backups.index')->with('status', 'System backup cannot be deleted!');
        } else {
            $backups->delete();
            return redirect()->route('admin.backups.index')->with('status', 'Backup deleted');
        }
    }
}
