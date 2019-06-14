<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        return view('admin.profile.index', ['user' => $user]);
    }

    public function notifications()
    {
        $user = Auth::user();

        return view('admin.profile.index', ['user' => $user]);
    }

    public function settings()
    {
        $user = Auth::user();

        return view('admin.profile.settings', ['user' => $user]);
    }

    public function edit()
    {
        $user = Auth::user();

        return view('admin.profile.index', ['user' => $user]);
    }
}
