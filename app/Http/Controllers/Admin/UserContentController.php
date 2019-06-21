<?php

namespace App\Http\Controllers\Admin;

use Route;
use App\Content;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserContentController extends Controller
{
    //
    public function index()
    {
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
