<?php

namespace Modules\System\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;

use Auth;
use App\Group;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return redirect()->route('admin.profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'username' => 'max:100',
            'email' => [
                'nullable',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->email, 'email'),
            ],
            'name' => 'max:100',
            'language' => 'max:2',
        ]);

        $updated = false;
        $username = $request->input('username');
        $email = $request->input('email');
        $name = $request->input('name');
        $avatar = null;
        if ($request->hasFile('avatar')) {
            $avatar = str_replace("public/", "", $request->file('avatar')->store('public/avatars'));
        }
        $groups = $request->input('groups');
        $language = $request->input('language');
        $new_pass = $request->input('new_password');
        $new_pass2 = $request->input('new_password2');

        try {
            if ($request->input('password_checked') && !($new_pass == null && $new_pass2 == null)) {
                if ($new_pass == $new_pass2) {
                    $updated = true;
                    $user->password = Hash::make($new_pass);
                } else {
                    return redirect()->route('admin.profile.edit')->with('error', 'Passwords do not match!');
                }
            }
            if ($username != null) {
                $user->name = $username;
            }
            if ($email != null) {
                $user->email = $email;
            }
            if ($name != null) {
                $user->name = $name;
            }
            if ($avatar != null) {
                $user->avatar = $avatar;
            }
            if ($language != null) {
                $user->language = $language;
            }
            $user->save();
            $user->groups()->sync($groups);
            $updated = true;

        } catch (\Exception $e) {
            return redirect()->route('admin.profile.edit')->with('error', $e->getMessage());
        }

        if ($updated) {
            return redirect()->route('admin.profile.edit')->with('success', 'Successfully updated!');
        } else {
            return redirect()->route('admin.profile.edit');
        }
    }

    public function contents()
    {
        $user = Auth::user();
        $type = Input::get('type', '');
        if ($type == '') {
            $type = session('type');
        }
        session(['type' => $type]);

        return view('admin.profile.contents.index', ['user' => $user]);
    }

    public function permissions()
    {
        $user = Auth::user();

        return view('admin.profile.permissions.index', ['user' => $user]);
    }

    public function notifications()
    {
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();

        return view('admin.profile.notifications.index', ['user' => $user]);
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
