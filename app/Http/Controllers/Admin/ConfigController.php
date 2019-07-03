<?php

namespace App\Http\Controllers\Admin;

use App;
use Storage;
use Artisan;
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
            'key' => 'required|max:100',
            'value' => 'required|max:255',
            'autoload' => 'nullable|boolean'
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

    public function edit(Request $request, $id)
    {
        $config = Config::findOrFail($id);
        return view('admin.configs.edit', ['config' => $config]);
    }

    public function update(Request $request, $id)
    {
        $config = Config::findOrFail($id);
        $request->validate([
            'title' => 'required|max:191',
            'description' => 'nullable|max:255',
            'key' => 'required|max:100',
            'value' => 'required|max:255',
            'autoload' => 'nullable|boolean'
        ]);

        $config->title = $request->input('title');
        $config->description = $request->input('description');
        $config->key = $request->input('key');
        $config->value = $request->input('value');
        $config->autoload = $request->input('autoload', false);
        $config->save();

        return redirect()->route('admin.configs.edit', ['id' => $config->id])->with('status', 'Successfuly updated configuration');
    }

    public function maintenance()
    {
        $exists = file_exists(storage_path('framework/down'));
        $message = "";
        $retry = "";
        $allowed = "";
        $time = "";
        $days = "";
        $hours = "";
        $minutes = "";

        if ($exists) {
            $content = json_decode(file_get_contents(storage_path('framework/down')), true);
            $message = $content['message'];
            $retry = $content['retry'];
            $allowed = implode(', ', $content['allowed']);
            $time = date('Y-m-d H:s', $content['time']);
            $now = time();
            $days = round(($now - $content['time']) / (60 * 60 * 24));
            $hours = round(($now - $content['time']) / (60 * 60));
            $minutes = round(($now - $content['time']) / (60));
        }

        return view('admin.configs.maintenance', ['maintenance' => [
            "status" => $exists ? 'down' : 'up',
            "message" => $message,
            "retry" => $retry,
            "allowed" => $allowed,
            "time" => $time,
            "days" => $days,
            "hours" => $hours,
            "minutes" => $minutes
        ]]);
    }

    public function setMaintenance(Request $request)
    {
        $request->validate([
            'status' => 'required'
        ]);

        if ($request->input('status') == 'down') {
            $command = 'down';
            $message = $request->input('message', null);
            $retry = $request->input('retry', null);
            $allowed = explode(',', $request->input('allowed', null));

            if ($message != null) {
                $command = $command . ' --message="' . $message . '"';
            }

            if ($retry != null) {
                $command = $command . ' --retry=' . $retry;
            }

            if (!in_array($request->ip(), $allowed)) {
                array_push($allowed, $request->ip());
            }
            foreach ($allowed as $key => $allow) {
                if (!empty($allow)) {
                    $command = $command . ' --allow=' . trim($allow);
                }
            }

            Artisan::call($command);

            return redirect()->route('admin.configs.maintenance')->with('status', 'Successfully enabled maintenance mode!');
        } else {
            Artisan::call('up');
            return redirect()->route('admin.configs.maintenance')->with('status', 'Successfully disabled maintenance mode!');
        }
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
        $configs = Config::where('key', 'LIKE', 'system.%')->get();
        return view('admin.configs.system', ['configs' => $configs]);
    }

    public function themes()
    {
        $configs = Config::where('key', 'LIKE', 'themes.%')->get();
        return view('admin.configs.themes', ['configs' => $configs]);
    }

    public function plugins()
    {
        $configs = Config::where('key', 'LIKE', 'plugins.%')->get();
        return view('admin.configs.plugins', ['configs' => $configs]);
    }

    public function security()
    {
        $configs = Config::where('key', 'LIKE', 'security.%')->get();
        return view('admin.configs.security', ['configs' => $configs]);
    }

    public function contents()
    {
        $configs = Config::where('key', 'LIKE', 'content.%')->get();
        return view('admin.configs.contents', ['configs' => $configs]);
    }
}
