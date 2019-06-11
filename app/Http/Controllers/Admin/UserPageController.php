<?php

namespace App\Http\Controllers\Admin;

use Route;
use App\Page;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserPageController extends Controller
{
    //
    public function index()
    {
        $user = User::findOrFail(Route::current()->parameter('user'));
        return view('admin.users.pages.index', ['user' => $user]);
    }

    public function show($id)
    {
        $user = User::findOrFail(Route::current()->parameter('user'));
        $page = Page::findOrFail($id);
        return view('admin.users.pages.show', ['user' => $user, 'page' => $page]);
    }
}
