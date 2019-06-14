<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Group;
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

        return view('admin.profile.index', ['user' => $user, 'groups' => Group::all()]);
    }

    public function notifications()
    {
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();

        return view('admin.profile.notifications', ['user' => $user]);
    }

    public function settings()
    {
        $user = Auth::user();

        return view('admin.profile.settings', ['user' => $user]);
    }

    public function edit()
    {
        $user = Auth::user();

        return view('admin.profile.index', ['user' => $user, 'groups' => Group::all()]);
    }

    public function readNotifications()
    {
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();
    }
}
