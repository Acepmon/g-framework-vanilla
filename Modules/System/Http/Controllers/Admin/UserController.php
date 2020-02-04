<?php

namespace Modules\System\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use Modules\System\Entities\Group;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereHas('groups', function ($query) {
            $query->where('id', '!=', 1)->where('id', '!=', 2);
        })->get();

        return view('admin.users.index', ['users' => $users]);
    }

    public function administrators()
    {
        $users = User::whereHas('groups', function ($query) {
            $query->where('id', 1);
        })->get();

        return view('admin.users.administrators', ['users' => $users]);
    }

    public function operators()
    {
        $users = User::whereHas('groups', function ($query) {
            $query->where('id', 2);
        })->get();

        return view('admin.users.operators', ['users' => $users]);
    }

    public function guests()
    {
        $users = User::whereHas('groups', function ($query) {
            $query->where('id', 4);
        })->get();

        return view('admin.users.guests', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', ['groups' => Group::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:100',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|min:6',
            'name' => 'required|max:100',
            'language' => 'required|max:2',
        ]);

        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');
        if ($password == $password_confirmation) {
            try {
                DB::beginTransaction();

                $user = new User();
                $user->username = $request->input('username');
                $user->email = $request->input('email');
                $user->password = Hash::make($password);
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->language = $request->input('language');
                if ($request->hasFile('avatar')) {
                    $user->avatar = str_replace("public/", "", $request->file('avatar')->store('public/avatars', 'ftp'));
                }
                $user->save();
                $user->groups()->sync($request->input('groups'));

                DB::commit();
                return redirect()->route('admin.users.create')->with('success', 'Successfully registered!');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('admin.users.create')->with('error', $e->getMessage());
            }
        } else {
            return redirect()->route('admin.users.create')->with('error', 'Passwords do not match!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = user::where('user_id', $id)->first();
        $user = User::findOrFail($id);
        return view('admin.users.show', ['user' => $user, 'groups' => Group::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        return view('admin.users.edit', ['user' => $user, 'groups' => Group::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
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
            $avatar = str_replace("public/", "", $request->file('avatar')->store('public/avatars', 'ftp'));
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
                    return redirect()->route('admin.users.edit', $id)->with('error', 'Passwords do not match!');
                }
            }
            if ($username != null) {
                $user->name = $username;
                // return redirect('/users/'.$id.'/edit')->with('error', 'Username cannot be blank!');
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
            return redirect()->route('admin.users.edit', $id)->with('error', $e->getMessage());
        }

        if ($updated) {
            return redirect()->route('admin.users.edit', $id)->with('success', 'Successfully updated!');
        } else {
            return redirect()->route('admin.users.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin.users.index');
    }
}
