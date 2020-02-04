<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Modules\System\Entities\Group;
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
}
