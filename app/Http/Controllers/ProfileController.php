<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use App\Profile;
use App\User;
use App\Role;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $profiles = Profile::all();
        return view('profiles.index', ['profiles' => $profiles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('profiles.create', ['roles' => $roles]);
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
        $temp = [
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'language' => $request->input('language'),
            'role_id' => $request->input('role_id'),
        ];
        Session::flash('profile', $temp);
        $validatedData = $request->validate([
            'username' => 'required|max:100',
            'email' => 'required|email|unique:profiles,email|max:255',
            'role_id' => 'required|integer|exists:roles,id',
            'password' => 'required|min:6',
            'name' => 'required|max:100',
            'language' => 'required|max:2',
        ]);

        $password = $request->input('password');
        $repeat_password = $request->input('repeat_password');
        if ($password == $repeat_password) {
            try{
                    DB::beginTransaction();
                    
                    $user = new User();
                    $user->name = $request->input('username');
                    $user->email = $request->input('email');
                    $user->password = Hash::make($password);
                    $user->save();

                    $profile = new Profile();
                    $profile->user_id = $user->id;
                    $profile->role_id = $request->input('role_id');
                    $profile->name = $request->input('name');
                    $profile->email = $request->input('email');
                    $profile->language = $request->input('language');
                    if ($request->hasFile('avatar')) {
                        $profile->avatar = str_replace("public/", "", $request->file('avatar')->store('public/avatars'));
                    }
                    $profile->save();

                    DB::commit();
                return redirect()->route('profiles.create')->with('success', 'Successfully registered!');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('profiles.create')->with('error', $e->getMessage());
            }
        } else {
            return redirect()->route('profiles.create')->with('error', 'Passwords do not match!');
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
        // $profile = Profile::where('user_id', $id)->first();
        $profile = Profile::findOrFail($id);
        $roles = Role::all();
        return view('profiles.show', ['profile' => $profile, 'roles' => $roles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //5002331176
        $profile = Profile::findOrFail($id);
        $roles = Role::all();
        return view('profiles.edit', ['profile' => $profile, 'roles' => $roles]);
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
        $profile = Profile::findOrFail($id);
        $validatedData = $request->validate([
            'username' => 'max:100',
            'email' => [
                'nullable',
                'email',
                'max:255',
                Rule::unique('profiles')->ignore($profile->email, 'email'),
            ],
            'role_id' => 'integer|exists:roles,id',
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
        $role_id = $request->input('role_id');
        $new_pass = $request->input('new_password');
        $new_pass2 = $request->input('new_password2');
        
        try{
            DB::beginTransaction();

            if ($request->input('password_checked') && !($new_pass == NULL && $new_pass2 == NULL)) {
                if ($new_pass == $new_pass2) {
                    $updated = true;
                    $profile->user->password = Hash::make($new_pass);
                    $profile->user->save();
                } else {
                    return redirect()->route('profiles.edit', $id)->with('error', 'Passwords do not match!');
                }
            }
            if ($username != NULL) {
                $profile->user->name = $username;
                // return redirect('/profiles/'.$id.'/edit')->with('error', 'Username cannot be blank!');
            }
            if ($email != NULL) {
                $profile->user->email = $email;
                $profile->email = $email;
            }
            if ($name != NULL) {
                $profile->name = $name;
            }
            if ($avatar != NULL) {
                $profile->avatar = $avatar;
            }
            if ($language != NULL) {
                $profile->language = $language;
            }
            if ($role_id != NULL) {
                $profile->role_id = $role_id;
            }
            $profile->user->save();
            //$profile->updated_at = date('Y-m-d H:i:s');
            $profile->save();
            $updated = true;

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('profiles.edit', $id)->with('error', $e->getMessage());
        }

        if ($updated) {
            return redirect()->route('profiles.edit', $id)->with('success', 'Successfully updated!');
        } else {
            return redirect()->route('profiles.edit', $id);
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
        Profile::destroy($id);
        User::destroy($id);
        return redirect()->route('profiles.index');
    }
}
