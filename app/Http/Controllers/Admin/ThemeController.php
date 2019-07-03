<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Theme;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
//use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $themes = Theme::all();
        return view('admin.themes.index', ['themes' => $themes]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $themes = Theme::all();
        return view('admin.themes.create', ['themes' => $themes]);
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
        $theme = new Theme();

        $theme->title = $request->title;
        $theme->description = $request->description;
        $theme->repository = $request->repository;
        $theme->version = '1.0.0';
        $theme->status = Theme::AVAILABLE;

        $theme->save();
        return redirect()->route('admin.themes.index')->with('status', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $theme = Theme::find($id);
        return view('admin.themes.show', ['plugin' => $theme]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $themes = Theme::all();

        $theme = Theme::find($id);
        return view('admin.themes.edit', ['plugin' => $theme, 'themes' => $themes]);
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

        $theme = Theme::findOrFail($id);

        $theme->title = $request->title;
        $theme->description = $request->description;
        $theme->save();

        return redirect()->route('admin.themes.edit', ['id' => $theme->id])->with('status', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $theme = Theme::findOrFail($id);

        $theme->status = Theme::FAILED;
        $pluginsPath = "../themes/";
        Storage::disk('themes')->deleteDirectory($theme->title);

        $theme->save();
        return redirect()->route('admin.themes.index');
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activate(Request $request, Theme $theme)
    {
        $theme->status = Theme::ACTIVATED;
        $theme->save();

        return response()->json(['status' => 'Success']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Request $request, Theme $theme)
    {
        $theme->status = Theme::DEACTIVATED;
        $theme->save();

        return response()->json(['status' => 'Success']);
    }

    public function installTheme(Request $request)
    {
        //ini_set('max_execution_time', 3000);
        $theme = Theme::findOrFail($request->id);
        $url = $theme->repository;
        $themesPath = "../themes/";
        $pathZip = $themesPath . $theme->title.".zip";

        $zipResource = fopen($pathZip, "w");
        // Get The Zip File From Server
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER,true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FILE, $zipResource);
        $page = curl_exec($ch);
        if(!$page) {
            echo "Error :- ".curl_error($ch);
        }
        curl_close($ch);
        $theme->status = Theme::DOWNLOADING;
        $theme->save();

        $this->extract($pathZip, $theme->title, $theme->id, $themesPath);

    }
    public function extract($path, $title, $id, $themesPath)
    {
        ini_set('max_execution_time', 3000);
        if(!Storage::disk('themes')->has($title)){
            Storage::disk('themes')->makeDirectory($title);
        }
        //$Path = public_path('test.zip');
        \Zipper::make($path)->extractTo($themesPath . $title);
        $theme = Theme::findOrFail($id);
        $theme->status = Theme::DEACTIVATED;
        $theme->save();
        return response()->json(['status' => 'Success']);
    }

}
