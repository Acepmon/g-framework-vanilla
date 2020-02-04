<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Modules\System\Entities\Group;
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
