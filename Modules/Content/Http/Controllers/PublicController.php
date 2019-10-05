<?php

namespace Modules\Content\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Content;
use Auth;

class PublicController extends Controller
{
    public function homepage() {
        $content = Content::where('slug', '/')->where('status', Content::STATUS_PUBLISHED)->first();

        $viewPath = config('content.pages.viewPath');

        return view($viewPath . '.' . $content->currentView());
    }

    public function uri($slug = '/') {
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