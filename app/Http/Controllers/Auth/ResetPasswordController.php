<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Group;
use App\Config;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
