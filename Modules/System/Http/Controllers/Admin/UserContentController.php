<?php

namespace Modules\System\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;

use Route;
use Modules\Content\Entities\Content;
use Modules\System\Entities\User;

class UserContentController extends Controller
{
    //
    public function index()
    {
        $type = Input::get('type', '');
        if ($type == '') {
            $type = session('type');
        }
        session(['type' => $type]);
        $user = User::findOrFail(Route::current()->parameter('user'));
        return view('admin.users.contents.index', ['user' => $user]);
    }

    public function show($id)
    {
        $user = User::findOrFail(Route::current()->parameter('user'));
        $content = Content::findOrFail(Route::current()->parameter('content'));
        return view('admin.users.contents.show', ['user' => $user, 'content' => $content]);
    }
}
