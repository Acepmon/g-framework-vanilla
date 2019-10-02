<?php

namespace Modules\System\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App;
use Storage;
use Artisan;
use Notification;
// use App\Config;
use App\Notifications\MaintenanceModeEnabled;
use App\Notifications\MaintenanceModeDisabled;

class ConfigController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.configs.base');
    }

    // public function create()
    // {
    //     return view('admin.configs.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|max:191',
    //         'description' => 'nullable|max:255',
    //         'key_module' => 'required|max:50',
    //         'key_component' => 'required|max:50',
    //         'key_function' => 'required|max:50',
    //         'value' => 'required|max:255',
    //         'autoload' => 'nullable|boolean'
    //     ]);

    //     $config = new Config();
    //     $config->title = $request->input('title');
    //     $config->description = $request->input('description');
    //     $config->key = implode('.', [
    //         $request->input('key_module'),
    //         $request->input('key_component'),
    //         $request->input('key_function')
    //     ]);
    //     $config->value = $request->input('value');
    //     $config->autoload = $request->input('autoload', false);
    //     $config->save();

    //     return redirect()->route('admin.configs.edit', ['id' => $config->id])->with('status', 'Successfuly registered new configuration');
    // }

    // public function edit(Request $request, $id)
    // {
    //     $config = Config::findOrFail($id);
    //     return view('admin.configs.edit', ['config' => $config]);
    // }

    // public function update(Request $request, $id)
    // {
    //     $config = Config::findOrFail($id);
    //     $request->validate([
    //         'title' => 'required|max:191',
    //         'description' => 'nullable|max:255',
    //         'key' => 'required|max:100',
    //         'value' => 'required|max:255',
    //         'autoload' => 'nullable|boolean'
    //     ]);

    //     $config->title = $request->input('title');
    //     $config->description = $request->input('description');
    //     $config->key = $request->input('key');
    //     $config->value = $request->input('value');
    //     $config->autoload = $request->input('autoload', false);
    //     $config->save();

    //     return redirect()->route('admin.configs.edit', ['id' => $config->id])->with('status', 'Successfuly updated configuration');
    // }

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
        $emails = config('system.maintenance.emails');

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
            "minutes" => $minutes,
            "emails" => $emails,
        ]]);
    }

    public function setMaintenance(Request $request)
    {
        $request->validate([
            'status' => 'required'
        ]);

        config(['system.maintenance.emails' => $request->input('emails', '')]);

        if ($request->input('status') == 'down') {
            $command = 'down';
            $message = $request->input('message', null);
            $retry = $request->input('retry', null);
            $allowed = explode(',', $request->input('allowed', null));
            $emails = $request->input('emails', '');

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

            foreach (explode(',', $emails) as $email) {
                Notification::route('mail', trim($email))
                            ->notify(new MaintenanceModeEnabled($message));
            }

            return redirect()->route('admin.configs.maintenance')->with('status', 'Successfully enabled maintenance mode!');
        } else {
            $emails = $request->input('emails', '');

            Artisan::call('up');

            foreach (explode(',', $emails) as $email) {
                Notification::route('mail', trim($email))
                            ->notify(new MaintenanceModeDisabled());
            }

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
            'system',
            'themes',
            'content'
        ];

        $configs = array_filter($configs, function ($config) {
            return Storage::disk('config')->exists($config . '.php');
        });

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
}
