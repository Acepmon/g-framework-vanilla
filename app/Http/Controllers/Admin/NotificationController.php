<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function channels()
    {
        return view('admin.notifications.channels');
    }

    public function triggers()
    {
        return view('admin.notifications.triggers');
    }

    public function events()
    {
        return view('admin.notifications.events');
    }

    public function templates()
    {
        return view('admin.notifications.templates');
    }
}
