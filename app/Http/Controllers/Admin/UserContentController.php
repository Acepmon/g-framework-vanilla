<?php

namespace App\Http\Controllers\Admin;

use Route;
use App\Content;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

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
