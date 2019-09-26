<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Content;
use App\Config;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function content($slug = '/') {
        $content = Content::where('slug', $slug)->where('status', Content::STATUS_PUBLISHED)->first();

        if ($content === null) {
            abort(404);
        } else {
            if ($content->visibility == Content::VISIBILITY_AUTH && !Auth::check()) {
                $this->middleware('auth');
            }

            $viewPath = config('content.'.$content->type.'s.viewPath');
            return view($viewPath . '.' . $content->currentView());
        }
    }
}
