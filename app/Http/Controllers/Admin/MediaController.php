<?php

namespace App\Http\Controllers\Admin;

use Storage;
use App\User;
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
        $files = Storage::disk('public')->files('avatars');
        $avatars = [];
        foreach ($files as $key => $file) {
            $user = User::where('avatar', $file)->first();
            array_push($avatars, [
                'file' => $file,
                'url' => url('storage/' . $file),
                'user' => $user
            ]);
        }

        return view('admin.media.avatars', ['avatars' => $avatars]);
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
        $directories = ['media', 'avatars', 'thumbnails', 'assets'];
        return view('admin.media.upload', ['directories' => $directories]);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'file' => 'required'
        ]);

        Storage::disk('public')->delete($request->input('file'));

        return redirect()->back();
    }
}
