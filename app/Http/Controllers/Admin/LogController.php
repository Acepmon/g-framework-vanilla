<?php

namespace App\Http\Controllers\Admin;

use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogController extends Controller
{
    public function index(Request $request)
    {
        $logs = [];
        $query = 'laravel';
        $today = date('Y-m-d');
        foreach (scandir(storage_path('logs')) as $value) {
            if (substr($value, 0, strlen($query)) === $query) {
                array_push($logs, [
                    'filename' => $value,
                    'date' => substr($value, 8, 10),
                    'is_today' => $today == substr($value, 8, 10)
                ]);
            }
        }

        rsort($logs);

        $file = $request->input('file', 'laravel-'. $today . '.log');
        $exists = false;

        if (file_exists(storage_path('logs/' . $file))) {
            $exists = true;
        }

        $file_contents = $exists ? file_get_contents(storage_path('logs/' . $file)) : null;

        // dd($logs);

        return view('admin.logs.index', ['logs' => $logs, 'file_contents' => $file_contents, 'exists' => $exists, 'filename' => $file]);
    }

    public function delete(Request $request, $filename)
    {
        if (file_exists(storage_path('logs/' . $filename))) {
            unlink(storage_path('logs/' . $filename));
            return redirect()->route('admin.logs.index');
        } else {
            abort(404);
        }
    }
}
