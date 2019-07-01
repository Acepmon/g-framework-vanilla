<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Content;
use App\Config;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function content($slug = '/') {
        $content = Content::where('slug', $slug)->where('status', Content::STATUS_PUBLISHED)->where('visibility', Content::VISIBILITY_PUBLIC)->first();

        if ($content === null) {
            abort(404);
        } else {
            $viewPath = Config::where('key', 'content.'.$content->type.'s.viewPath')->first()->value;
            return view($viewPath . '.' . $content->currentView());
        }
    }
}
