<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
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
        //
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            try{
                $user = new User();
                $user->username = $request->input('username');
                $user->email = $request->input('email');
                $user->password = Hash::make($password);
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->language = $request->input('language');
                if ($request->hasFile('avatar')) {
                    $user->avatar = str_replace("public/", "", $request->file('avatar')->store('public/avatars'));
                }
                $user->save();

                return redirect()->route('users.create')->with('success', 'Successfully registered!');
            } catch (\Exception $e) {
                return redirect()->route('users.create')->with('error', $e->getMessage());
            }
        } else {
            return redirect()->route('users.create')->with('error', 'Passwords do not match!');
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
        //
        // $user = user::where('user_id', $id)->first();
        $user = User::findOrFail($id);
        return view('users.show', ['user' => $user]);
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
        return view('users.edit', ['user' => $user]);
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
        //
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
        $avatar = NULL;
        if ($request->hasFile('avatar')) {
            $avatar = str_replace("public/", "", $request->file('avatar')->store('public/avatars'));
        }
        $language = $request->input('language');
        $new_pass = $request->input('new_password');
        $new_pass2 = $request->input('new_password2');
        
        try{
            if ($request->input('password_checked') && !($new_pass == NULL && $new_pass2 == NULL)) {
                if ($new_pass == $new_pass2) {
                    $updated = true;
                    $user->password = Hash::make($new_pass);
                } else {
                    return redirect()->route('users.edit', $id)->with('error', 'Passwords do not match!');
                }
            }
            if ($username != NULL) {
                $user->name = $username;
                // return redirect('/users/'.$id.'/edit')->with('error', 'Username cannot be blank!');
            }
            if ($email != NULL) {
                $user->email = $email;
            }
            if ($name != NULL) {
                $user->name = $name;
            }
            if ($avatar != NULL) {
                $user->avatar = $avatar;
            }
            if ($language != NULL) {
                $user->language = $language;
            }
            $user->save();
            $updated = true;

        } catch (\Exception $e) {
            return redirect()->route('users.edit', $id)->with('error', $e->getMessage());
        }

        if ($updated) {
            return redirect()->route('users.edit', $id)->with('success', 'Successfully updated!');
        } else {
            return redirect()->route('users.edit', $id);
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
        //
        User::destroy($id);
        return redirect()->route('users.index');
    }
}
