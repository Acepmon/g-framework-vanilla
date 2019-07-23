<?php

namespace App\Http\Controllers\Admin;

use Storage;
use Zipper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jackiedo\LogReader\LogReader;

class LogController extends Controller
{
    protected $reader;

    public function __construct(LogReader $reader)
    {
        $this->reader = $reader;
    }

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

        return view('admin.logs.index', ['logs' => $logs, 'file_contents' => $file_contents, 'exists' => $exists, 'filename' => $file, ]);
    }

    public function reader()
    {
        return view('admin.logs.reader');
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

    public function deleteAll(Request $request)
    {
        foreach (scandir(storage_path('logs')) as $value) {
            if (file_exists(storage_path('logs/' . $value)) && \Str::endsWith($value, '.log')) {
                unlink(storage_path('logs/' . $value));
            }
        };

        return redirect()->route('admin.logs.index');
    }

    public function downloadAll(Request $request)
    {
        $zipFile = storage_path('logs' . DIRECTORY_SEPARATOR . time() . '.zip');
        $zip = Zipper::make($zipFile);

        foreach (scandir(storage_path('logs')) as $value) {
            if (file_exists(storage_path('logs' . DIRECTORY_SEPARATOR . $value)) && \Str::endsWith($value, '.log')) {
                $zip->add(storage_path('logs' . DIRECTORY_SEPARATOR . $value));
            }
        };

        $zip->close();

        return response()->download($zipFile)->deleteFileAfterSend();
    }

    public function ajaxLogsList()
    {
        $reader = $this->reader->get()->map(function ($item) {
            $item->time = $item->date->format('H:m:s');
            $item->date = $item->date->format('Y-m-d');
            $item->header_limit = \Str::limit($item->header, 150);
            $item->exception = 'Exception';
            $item->caught_at = '';
            return $item;
        });

        return response()->json($reader);
    }

    public function ajaxLogsDetails($id)
    {
        $reader = $this->reader->get()->first(function ($item) {
            return $item->id == $id;
        });

        return response()->json(['data' => $reader]);
    }
}
