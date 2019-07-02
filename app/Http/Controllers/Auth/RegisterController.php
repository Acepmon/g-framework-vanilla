<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Group;
use App\Config;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'name' => ['max:100'],
            // 'avatar' => ['image'],
            // 'language' => ['required', 'max:2'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'name' => $data['name'],
            // 'avatar' => $avatar,
            // 'language' => $data['language'],
            'language' => 'en'
        ]);

        $groupId = Config::getValue('system.register.defaultGroup');
        if (!empty($groupId)) {
            $user->groups()->attach($groupId);
        }

        return $user;
    }

    protected function redirectTo()
    {
        $path = '/home';

        if (Auth::user()->is_admin()) {
            $path = Config::getValue('system.auth.adminRedirectPath');
        } else if (Auth::user()->is_operator()) {
            $path = Config::getValue('system.auth.operatorRedirectPath');
        } else if (Auth::user()->is_member()) {
            $path = Config::getValue('system.auth.memberRedirectPath');
        } else {
            $path = Config::getValue('system.auth.guestRedirectPath');
        }

        return $path;
    }
}
