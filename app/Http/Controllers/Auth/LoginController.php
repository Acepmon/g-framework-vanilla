<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Group;
use App\Config;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    protected function redirectTo()
    {
        $path = '/home';

        if (Auth::user()->groups->contains(Group::find(1))) {
            $path = Config::getValue('system.auth.adminRedirectPath');
        } else if (Auth::user()->groups->contains(Group::find(2))) {
            $path = Config::getValue('system.auth.operatorRedirectPath');
        } else if (Auth::user()->groups->contains(Group::find(3))) {
            $path = Config::getValue('system.auth.memberRedirectPath');
        } else {
            $path = Config::getValue('system.auth.guestRedirectPath');
        }

        return $path;
    }
}
