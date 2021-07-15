<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Library\EmailTemplate;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        return 'name';
    }

    protected function authenticated(\Illuminate\Http\Request $request, $user)
    {
        $ip = $request-> ip();
        self::sendMailForTellingLoginInfoForNotification($user->email, $ip);
    }

    public function sendMailForTellingLoginInfoForNotification($ip){

        $subject = "GOOD ENOUGH・ログイン確認メール";
        $from = EmailTemplate::sendnotificationEmail;

        $header = EmailTemplate::header($name);
        $cryptWithdrawalToOperator = EmailTemplate::LoginInfoForNotification($ip);
        $noreplyFooter = EmailTemplate::noreplyFooter($name);
        $signature = EmailTemplate::signature($name);

        $mailbodyArray = array($header, $cryptWithdrawalToOperator, $noreplyFooter, $signature);

        $mailbody = implode("\n\n", $mailbodyArray);

        $suc = EmailTemplate::executeSendEmail($to, $subject, $mailbody, $from);
    }
}
