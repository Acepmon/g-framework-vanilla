<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
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
        return view('test.profile_list', ['profiles' => $profiles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('test.profile_create', ['roles' => $roles]);
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
            'email' => 'required|email|unique:profiles,email|max:255',
            'role_id' => 'required|integer|exists:roles,id',
            'password' => 'required',
            'name' => 'required|max:100',
            'nickname' => 'required|max:100',
            'avatar' => 'required',
            'language' => 'required|max:2',
        ]);

        $password = $request->input('password');
        $password2 = $request->input('password2');
        if ($password == $password2) {
            try{
                    DB::beginTransaction();
                    
                    $user = new User();
                    $user->name = $request->input('username');
                    $user->email = $request->input('email');
                    $user->password = $password;
                    $user->save();

                    $profile = new Profile();
                    $profile->user_id = $user->id;
                    $profile->role_id = $request->input('role_id');
                    $profile->name = $request->input('name');
                    $profile->nickname = $request->input('nickname');
                    $profile->email = $request->input('email');
                    $profile->language = $request->input('language');
                    $profile->avatar = str_replace("public/", "", $request->file('avatar')->store('public/avatars'));
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
        $profile = Profile::find($id);
        return view('test.profile_detail', ['profile' => $profile]);
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
        $profile = Profile::find($id);
        $roles = Role::all();
        return view('test.profile_edit', ['profile' => $profile, 'roles' => $roles]);
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
        $validatedData = $request->validate([
            'username' => 'max:100',
            'email' => 'nullable|email|unique:profiles,email|max:255',
            'role_id' => 'integer|exists:roles,id',
            'name' => 'max:100',
            'nickname' => 'max:100',
            'language' => 'max:2',
        ]);

        $profile = Profile::find($id);//->first();
        $updated = false;
        $username = $request->input('username');
        $email = $request->input('email');
        $name = $request->input('name');
        $nickname = $request->input('nickname');
        $avatar = NULL;
        if ($request->hasFile('avatar')) {
            $avatar = str_replace("public/", "", $request->file('avatar')->store('public/avatars'));
        }
        $language = $request->input('language');
        $role_id = $request->input('role_id');
        $new_pass = $request->input('new_password');
        $new_pass2 = $request->input('new_password2');
        
        try{
            if ($request->input('password') && !($new_pass == NULL && $new_pass2 == NULL)) {
                if ($new_pass == $new_pass2) {
                    $updated = true;
                    $profile->user->password = $new_pass;
                    $profile->user->save();
                } else {
                    return redirect('/profiles/'.$id.'/edit')->with('error', 'Passwords do not match!');
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
            if ($nickname != NULL) {
                $profile->nickname = $nickname;
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
        } catch (\Exception $e) {
            return redirect('/profiles/'.$id.'/edit')->with('error', $e->getMessage());
        }

        if ($updated) {
            return redirect('/profiles/'.$id.'/edit')->with('success', 'Successfully updated!');
        } else {
            return redirect('/profiles/'.$id.'/edit');
        }
        // } else {
        //     return redirect('/profiles/'.$id.'/edit')->with('error', 'Wrong Password!');
        // }
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
        // User:destroy($id);
        return redirect('/profiles');
    }
}
