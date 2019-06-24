<?php

namespace App\Http\Controllers\Admin;

use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogController extends Controller
{
    public function index()
    {
        $logs = [];
        $query = 'laravel';
        foreach (scandir(storage_path('logs')) as $value) {
            if (substr($value, 0, strlen($query)) === $query) {
                array_push($logs, [
                    'filename' => $value,
                    'date' => substr($value, 8, 10),
                    'is_today' => date('Y-m-d') == substr($value, 8, 10)
                ]);
            }
        }

        rsort($logs);

        return view('admin.logs.index', ['logs' => $logs]);
    }

    public function show($filename)
    {
        if (!file_exists(storage_path('logs/' . $filename))) {
            abort(404);
        }

        $log = file_get_contents(storage_path('logs/' . $filename));

        return view('admin.logs.show', ['log' => $log, 'filename' => $filename]);
    }
}
