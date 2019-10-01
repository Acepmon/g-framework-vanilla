<?php

namespace Modules\System\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Route;
use App\User;
use App\Setting;

class UserSettingController extends Controller
{
    //
    public function index()
    {
        $user = User::findOrFail(Route::current()->parameter('user'));
        return view('admin.users.settings.index', ['user' => $user]);
    }

    public function create()
    {
        $user = User::findOrFail(Route::current()->parameter('user'));
        return view('admin.users.settings.create', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'key' => 'required|max:100',
            'value' => 'required|max:255'
        ]);
        try {
            $user_id = Route::current()->parameter('user');
            $setting = new Setting();
            $setting->user_id = $user_id;
            $setting->key = $request->input('key');
            $setting->value = $request->input('value');
            $setting->save();

            $user = User::findOrFail($user_id);
            return redirect()->route('admin.users.settings.index', ['user' => $user]);
        } catch (\Exception $e) {
            $user = User::findOrFail($user_id);
            return redirect()->route('admin.users.settings.create', ['user' => $user])->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $setting = Setting::findOrFail(Route::current()->parameter('setting'));
        $user = User::findOrFail(Route::current()->parameter('user'));
        return view('admin.users.settings.edit', ['user' => $user, 'setting' => $setting]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'key' => 'required|max:100',
            'value' => 'required|max:255'
        ]);
        $setting = Setting::findOrFail(Route::current()->parameter('setting'));
        $user_id = Route::current()->parameter('user');
        try{
            $setting->key = $request->input('key');
            $setting->value = $request->input('value');
            $setting->save();
            $user = User::findOrFail($user_id);
            return redirect()->route('admin.users.settings.index', ['user' => $user]);
        } catch (\Exception $e) {
            $user = User::findOrFail($user_id);
            return redirect()->route('admin.users.settings.edit', ['user' => $user, 'setting' => $setting])->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $setting_id = Route::current()->parameter('setting');
        Setting::destroy($setting_id);
        $user = User::findOrFail(Route::current()->parameter('user'));
        return redirect()->route('admin.users.settings.index', ['user' => $user]);
    }
}
