<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    public function maintenance()
    {
        return view('admin.configs.maintenance');
    }

    public function base()
    {
        $configs = config()->all();
        return view('admin.configs.base', ['configs' => $configs]);
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
