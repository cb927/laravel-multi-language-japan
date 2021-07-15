<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Account;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use \GuzzleHttp\Client;
use App\Library\HttpRequest;

use App\Library\GlobalVariable;

use App\Library\EmailTemplate;

use App\Library\CreateAccount;

use App\Library\MT4API;



class Mt4LoginController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            return redirect(route("my-page"));
        }

        $currentPath = asset('static') . "/ja/cabinet";
        $thisRouteName = 'mt4login';

        $global = GlobalVariable::get_global_variable();

        return view('login.mt4')->with([
            "currentPath" => $currentPath,
            "thisRouteName" => $thisRouteName,
            "inqueryComplete" => $request->inqueryComplete,
            "global" => $global,
        ]);
    }

    public function postIndex(Request $request)
    {
        // dd($request->name, $request->password);
        // 認証失敗時リダイレクト
        $credentials = $request->only('name', 'password');
        if (!Auth::attempt($credentials)) {
            return redirect()->intended('mt4login');
        }

        $login_user = Auth::user();

        //ログインユーザが２段階認証を設定していない時には、会員ページにリダイレクト(この時点で認証完了しているので)
        if (!$login_user->google2fa_valid) {
            $ip = $request->ip();
            //self::sendMailForTellingLoginInfoForNotification($ip);

            return redirect(route("my-page"));
        }

        $google2fa_secret = $login_user->google2fa_secret;
        Auth::logout();

        $currentPath = asset('static') . "/ja/cabinet";
        $thisRouteName = '2fa';

        return view('login.2fa')->with([
            "currentPath" => $currentPath,
            "thisRouteName" => $thisRouteName,
            "inqueryComplete" => $request->inqueryComplete,
            'accountnum' => $request->accountnum,
            'password' => $request->password,
            'google2fa_secret' => $google2fa_secret
        ]);
    }

    private function sendMailForTellingLoginInfoForNotification($ip)
    {

        $name = self::GetThisUserAccountInfo()->name;
        $to = self::GetThisUserAccountInfo()->email;

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

    private function GetThisUserAccountInfo()
    {
        $login_user_name = Auth::user()->name;
        $valid = Auth::user()->valid;

        //ログイン情報から、プラットフォームと口座番号取得
        $login_user_info = explode("-", $login_user_name);
        $platform = $login_user_info[0];
        $account_number = $login_user_info[1];

        //口座番号から、口座詳細取得
        if ($valid == 0 && strlen($account_number) == 6) {
            $this_user_account_info = Account::find($account_number);
        } else {
            $this_user_account_info = Account::Where("account_number", $account_number)->first();
        }

        return $this_user_account_info;
    }

    public function fa2Confirm(Request $request)
    {
        $google2fa_login_url = asset('GoogleAuthenticator') . "/login.php";

        $parameter = "?secret=" . $request->google2fa_secret . "&oneCode=" . $request->onepass;

        $google2fa_secret = HttpRequest::GetRequest($google2fa_login_url . $parameter);

        // 認証失敗
        if ($google2fa_secret != 'OK') {
            return redirect()->intended('mt4login');
        }

        // ログイン (必ず成功するはず)
        $credentials = $request->only('name', 'password');
        if (!Auth::attempt($credentials)) {
            return redirect()->intended('mt4login');
        }

        $ip = $request->ip();
        self::sendMailForTellingLoginInfoForNotification($ip);
        return redirect(route("my-page"));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect(route("top"));
    }

    public function myPage()
    {
        return view('my_page.my-page');
    }

    public function passwordReset(Request $request)
    {

        $currentPath = asset('static') . "/ja/cabinet";
        $thisRouteName = 'password-reset';

        $global = GlobalVariable::get_global_variable();

        return view('login.password_reset')->with([
            "currentPath" => $currentPath,
            "thisRouteName" => $thisRouteName,
            "global" => $global,
        ]);
    }

    public function resetConfirm(Request $request)
    {

        $to = $request->email;

        $currentPath = asset('static') . "/ja/cabinet";

        $global = GlobalVariable::get_global_variable();

        $password = CreateAccount::random();

        $user = User::Where("email", $request->email)->first();
        $user->password = Hash::make($password);
        $user->save();

        MT4API::changePassword($user->account_number, $password);

        self::passwordResetEmail($password, $user->name, $user->email);

        return view('login.reset_confirm')->with([
            "currentPath" => $currentPath,
            "global" => $global,
        ]);
    }

    private function passwordResetEmail($password, $name, $to)
    {

        $subject = "GOOD ENOUGH・パスワード再発行";
        $from = EmailTemplate::sendnotificationEmail;

        $header = EmailTemplate::header($name);
        $cryptWithdrawalToOperator = EmailTemplate::passwordResetNotification($password);
        $noreplyFooter = EmailTemplate::noreplyFooter($name);
        $signature = EmailTemplate::signature($name);

        $mailbodyArray = array($header, $cryptWithdrawalToOperator, $noreplyFooter, $signature);

        $mailbody = implode("\n\n", $mailbodyArray);

        $suc = EmailTemplate::executeSendEmail($to, $subject, $mailbody, $from);

        return;
    }
}
