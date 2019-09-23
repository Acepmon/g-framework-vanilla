<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use File;
use Str;
use App\Locale;

class LocalizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $localizations = Locale::getAll();

        return view('admin.localizations.index', ['localizations' => $localizations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.localizations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        if ($request->has('locale')) {
            $locale = $request->input('locale');
            $name = Str::snake($request->input('name'));
            $path = resource_path('lang/' . $locale . '/' . $name . '.php');
            $content = '<?php

return [

    "' . $name . '" => "Translation Text Here",

];';

            if (File::exists($path)) {
                abort(500, 'File Name Exists');
            } else {
                file_put_contents($path, $content);
                return back()->with('status', 'Successfully created new locale file!');
            }
        } else {
            $name = Str::snake($request->input('name'));
            $path = resource_path('lang/' . $name . '/');

            if (File::exists($path)) {
                abort(500, 'Locale already exists');
            } else {
                File::makeDirectory($path);
                return back()->with('status', 'Successfully created new localization!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale)
    {
        $localization = Locale::get($locale);

        return view('admin.localizations.show', ['localization' => $localization]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.localizations.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required'
        ]);

        $file = resource_path('lang/' . $locale . '/' . $request->input('name') . '.php');
        try {
            if (File::exists($file)) {
                File::put($file, $request->input('content'));
            }
        } catch (Exception $ex) {
            abort(400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $locale)
    {
        if ($request->has('name')) {
            $name = $request->input('name');
            $path = resource_path('lang/' . $locale . '/' . $name . '.php');

            if (File::exists($path)) {
                File::delete($path);

                return back()->with('status', 'Successfully deleted locale file!');
            }
        } else {
            $path = resource_path('lang/' . $locale . '/');

            if (File::exists($path)) {
                File::deleteDirectory($path);

                return redirect()->route('admin.localizations.index')->with('status', 'Successfully deleted localization!');
            }
        }
    }
}
