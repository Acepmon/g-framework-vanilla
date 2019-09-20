<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Group;
use App\Config;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Socialite;

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
            'avatar' => $data['avatar'],
            // 'language' => $data['language'],
            'language' => 'en'
        ]);
        if (array_key_exists('emailVerifiedAt', $data)) {
            $user->email_verified_at = now();
            $user->save();
        }

        $groupId = (array_key_exists('group', $data) && $data['group']) || config('system.register.defaultGroup');
        if (!empty($groupId)) {
            $user->groups()->attach($groupId);
        }

        if (array_key_exists('social_id', $data) && array_key_exists('social_provider', $data) && array_key_exists('social_token', $data)) {
            $user->social_id = $data['social_id'];
            $user->social_provider = $data['social_provider'];
            $user->social_token = $data['social_token'];
            $user->save();
        }

        return $user;
    }

    protected function redirectTo()
    {
        $path = '/home';

        if (Auth::user()->is_admin()) {
            $path = config('system.auth.adminRedirectPath');
        } else if (Auth::user()->is_operator()) {
            $path = config('system.auth.operatorRedirectPath');
        } else if (Auth::user()->is_member()) {
            $path = config('system.auth.memberRedirectPath');
        } else {
            $path = config('system.auth.guestRedirectPath');
        }

        return $path;
    }

    /*
    * Social Register Handlers
    * See more at: https://laravel.com/docs/5.8/socialite
    */
    public function redirectToProvider($driver) {
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback($driver)
    {
        try {
            $user = Socialite::driver($driver)->user();
        } catch (\Exception $e) {
            return redirect()->route('register');
        }

        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            auth()->login($existingUser, true);
        } else {
            // Sample User Registration
            $newUser = $this->create([
                'username' => $user->getEmail(),
                'email' => $user->getEmail(),
                'emailVerifiedAt' => now(),
                'password' => $user->getId(),//sample password
                'name' => $user->getName(),
                'avatar' => $user->getAvatar(),
                'language' => 'mn',
                'social_id' => $user->getId(),
                'social_provider' => $driver,
                'social_token' => $user->token
            ]);
            auth()->login($newUser, true);
        }

        return redirect($this->redirectPath());
    }
}
