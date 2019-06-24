<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MediaController extends Controller
{
    public function index()
    {
        return view('admin.media.index');
    }

    public function medias()
    {
        return view('admin.media.medias');
    }

    public function avatars()
    {
        return view('admin.media.avatars');
    }

    public function thumbnails()
    {
        return view('admin.media.thumbnails');
    }

    public function assets()
    {
        return view('admin.media.assets');
    }

    public function upload()
    {
        return view('admin.media.upload');
    }
}
