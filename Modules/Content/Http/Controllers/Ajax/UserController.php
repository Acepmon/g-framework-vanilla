<?php

namespace Modules\Content\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'username' => ['nullable', 'string', 'max:191'],
            'email' => ['nullable', 'string', 'email', 'max:191', Rule::unique('users')->ignore($user->email, 'email'),],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'name' => ['nullable', 'max:100'],
        ]);

        if ($request->has('username')) {
            $user->username = $request->input('username');
            $user->save();
        }

        if ($request->has('email')) {
            $user->email = $request->input('email');
            $user->save();
        }

        if ($request->has('password')) {
            $user->password = $request->input('password');
            $user->save();
        }

        if ($request->has('name')) {
            $user->name = $request->input('name');
            $user->save();
        }

        if ($request->has('avatar')) {
            $user->avatar = $request->input('avatar');
            $user->save();
        }

        if ($request->has('language')) {
            $user->language = $request->input('language');
            $user->save();
        }

        $inputExcept = ['id', 'username', 'email', 'email_verified_at', 'password', 'password_confirmation', 'name', 'avatar', 'language', 'remember_token', 'created_at', 'updated_at', 'deleted_at', 'social_id', 'social_provider', 'social_token'];
        $metaInputs = array_filter($request->input(), function ($key) use ($inputExcept) {
            return !in_array($key, $inputExcept);
        }, ARRAY_FILTER_USE_KEY);

        if (count($metaInputs) > 0) {
            foreach ($metaInputs as $key=>$value) {
                $user->setMetaValue($key, $value);
            }
        }

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
