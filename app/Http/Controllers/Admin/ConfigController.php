<?php

namespace App\Http\Controllers\Admin;

use App;
use Storage;
use App\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    public function create()
    {
        return view('admin.configs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:191',
            'description' => 'nullable|max:255',
            'key' => 'required|unique:configs|max:100',
            'value' => 'required|max:255',
            'autoload' => 'nullable|boolean|'
        ]);

        $config = new Config();
        $config->title = $request->input('title');
        $config->description = $request->input('description');
        $config->key = $request->input('key');
        $config->value = $request->input('value');
        $config->autoload = $request->input('autoload', false);
        $config->save();

        return redirect()->route('admin.configs.show')->with('status', 'Successfuly registered new configuration');
    }

    public function maintenance()
    {
        return view('admin.configs.maintenance');
    }

    public function base()
    {
        $configs = [
            'app',
            'auth',
            'broadcasting',
            'cache',
            'database',
            'filesystems',
            'hashing',
            'logging',
            'mail',
            'queue',
            'services',
            'session',
            'tinker',
            'view',
        ];

        return view('admin.configs.base', ['configs' => $configs]);
    }

    public function updateBase(Request $request)
    {
        $request->validate([
            'config' => 'required',
            'content' => 'required'
        ]);

        try {
            $config = $request->input('config');
            $content = $request->input('content');
            Storage::disk('config')->put($config.'.php', $content);
            return response()->json(["result" => "success"]);
        } catch (\Exception $e) {
            abort(400);
        }
    }

    public function system()
    {
        return view('admin.configs.system');
    }

    public function themes()
    {
        return view('admin.configs.themes');
    }

    public function plugins()
    {
        return view('admin.configs.plugins');
    }

    public function security()
    {
        return view('admin.configs.security');
    }
}
