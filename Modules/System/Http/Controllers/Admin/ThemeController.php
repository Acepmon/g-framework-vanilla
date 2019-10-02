<?php

namespace Modules\System\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Theme;
use File;

use GuzzleHttp\Client;

class ThemeController extends Controller
{
    private $marketUrl = 'https://raw.githubusercontent.com/Acepmon/g-framework-templates/master/marketplace.json';

    private function marketplaceTemplates() {
        $client = new Client();
        $result = $client->get($this->marketUrl);
        $body = $result->getBody();
        $json = json_decode($body, true);
        return $json;
    }

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
        $allThemes = Theme::all();
        $templates = $this->marketplaceTemplates();
        $themes = [];

        foreach ($templates as $key => $template) {
            $found = false;
            foreach ($allThemes as $key2 => $theme) {
                if ($template['package'] == $theme->package) {
                    $found = true;

                    if ($template['version'] != $theme->version) {
                        array_push($themes, $template);
                    }

                    if ($theme->status == Theme::AVAILABLE) {
                        array_push($themes, $template);
                    }

                    $theme->title = $template['title'];
                    $theme->description = $template['description'];
                    $theme->save();
                }
            }

            if (!$found) {
                array_push($themes, $template);

                $newTheme = new Theme();
                $newTheme->package = $template['package'];
                $newTheme->title = $template['title'];
                $newTheme->description = $template['description'];
                $newTheme->version = $template['version'];
                $newTheme->status = Theme::AVAILABLE;
                $newTheme->save();
            }
        }


        return view('admin.themes.create', ['themes' => $allThemes]);
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
        return redirect()->route('admin.themes.edit', $id);
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
        return view('admin.themes.edit', ['theme' => $theme, 'themes' => $themes]);
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

        return redirect()->route('admin.themes.index', ['id' => $theme->id])->with('status', 'Success');
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

        $theme->status = Theme::UNINSTALLED;
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

    public function editLayout(Request $request, $id, $name) {
        $theme = Theme::findOrFail($id);
        $layout = array_filter($theme->layouts(), function ($item) use ($name) {
            if ($item['text'] == $name) {
                return $item;
            }
        });

        if (!$layout) {
            abort(404);
        }

        if (count($layout) > 0) {
            $layout = $layout[key($layout)];
        }

        return view('admin.themes.layouts.edit', ['theme' => $theme, 'layout' => $layout]);
    }

    public function updateLayout(Request $request, $id, $name) {
        $request->validate([
            'content' => 'required'
        ]);

        $content = $request->input('content');
        $theme = Theme::findOrFail($id);
        $layout = array_filter($theme->layouts(), function ($item) use ($name) {
            if ($item['text'] == $name) {
                return $item;
            }
        });

        if (!$layout) {
            abort(404);
        }

        if (count($layout) > 0) {
            $layout = $layout[key($layout)];
        }

        if (File::put($layout['fullPath'], $content)) {
            return response()->file($layout['fullPath']);
        }
    }

    public function editInclude(Request $request, $id, $name) {
        $theme = Theme::findOrFail($id);
        $include = array_filter($theme->includes(), function ($item) use ($name) {
            if ($item['text'] == $name) {
                return $item;
            }
        });

        if (!$include) {
            abort(404);
        }

        if (count($include) > 0) {
            $include = $include[key($include)];
        }

        return view('admin.themes.includes.edit', ['theme' => $theme, 'include' => $include]);
    }

    public function updateInclude(Request $request, $id, $name) {
        $request->validate([
            'content' => 'required'
        ]);

        $content = $request->input('content');
        $theme = Theme::findOrFail($id);
        $include = array_filter($theme->includes(), function ($item) use ($name) {
            if ($item['text'] == $name) {
                return $item;
            }
        });

        if (!$include) {
            abort(404);
        }

        if (count($include) > 0) {
            $include = $include[key($include)];
        }

        if (File::put($include['fullPath'], $content)) {
            return response()->file($include['fullPath']);
        }
    }
}
