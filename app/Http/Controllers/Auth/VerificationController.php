<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Group;
use App\Config;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
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
