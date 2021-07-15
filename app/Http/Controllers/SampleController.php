<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Account;
use \GuzzleHttp\Client;
use App\Library\EmailTemplate;
use App\Library\MT4API;
use Illuminate\Support\Facades\Hash;
use App\Affiliateusers;
use App\Library\GlobalVariable;

class SampleController extends Controller
{
    public function activateAccount(Request $request)
    {
        // 未有効ユーザ取得
        $users = User::where("valid", 0)->get();

        // mt4ユーザアカウント
        $usersWithEquityInJson = MT4API::usersWithEquity();
        $usersWithEquity = json_decode($usersWithEquityInJson, true);
        
        // 未有効ユーザ各各に対して、
        foreach($users as $user)
        {
            // 本ユーザの口座番号を取得
            $account_number = self::GetAccountNumber($user);

            // 本ユーザのmt4ユーザアカウントを取得
            $thisUserWithEquity = self::GetThisUserWithEquity($usersWithEquity, $account_number);
            
            // 本ユーザのmt4ユーザアカウントが存在していて、未有効化グループに属していない場合には
            if($thisUserWithEquity != null && $thisUserWithEquity["group"] != MT4API::GetInvalidAccountGroup())
            {
                if($user->old_name != "running")
                {
                    //口座番号から、口座詳細取得
                    if( strlen($account_number)==6 ){
                        $this_user_account_info = Account::find($account_number);
                    }else{
                        $this_user_account_info = Account::Where("account_number",$account_number)->first();
                    }
                    $details = json_decode($this_user_account_info->detail, true);
                    if(isset($details['company']))
                    {
                        $kind = '法人';
                    }else
                    {
                        $kind = '個人';
                    }


                    // 本ユーザのパスワードを変更して、そのパスワードを、口座番号とともにユーザに通知

                    // パスワード発行
                    $password = self::random();

                    // mt4パスワードをこれに変更
                    $result = MT4API::changePassword($account_number, $password);

                    // goodenoughのログインパスワードをこれに変更
                    $hashedNewPassword = Hash::make($password);
                    $user->password = $hashedNewPassword;
                    $user->old_name = "running";

                    // goodenough affiliate の方のパスワードも変更
                    $affiliateUser = Affiliateusers::Where("account_number",$account_number)->first();
                    if($affiliateUser != null)
                    {
                        $affiliateUser->password = $hashedNewPassword;
                        $affiliateUser->save();
                        echo("save;");
                    }

                    // パスワードをユーザに通知
                    self::sendMailForNotificateLoginInfo($user->email, $details['backend']['user']['name'], $account_number, $password, $kind, $thisUserWithEquity["group"], false, $affiliateUser);

                    $uneiEmail = EmailTemplate::personalAccountRegistration;
                    if(isset($details['company']))
                    {
                        $uneiEmail = EmailTemplate::corporateAccountRegistration;
                    }

                    //運営用（情報を通知）
                    self::sendMailForNotificateLoginInfo($uneiEmail, $details['backend']['user']['name'], $account_number, $password, $kind, $thisUserWithEquity["group"], true, $affiliateUser);

                    echo("initial_success!");
                }

                $user->valid = true;
                $user->save();

                echo("success!");

            }
        }

        
    }

    public function passivateAccount(Request $request)
    {
        // 有効済ユーザ取得
        $users = User::where("valid", 1)->get();

        // mt4ユーザアカウント
        $usersWithEquityInJson = MT4API::usersWithEquity();
        $usersWithEquity = json_decode($usersWithEquityInJson, true);

        // 有効済ユーザ各各に対して、
        foreach($users as $user)
        {
            // 本ユーザの口座番号を取得
            $account_number = self::GetAccountNumber($user);

            // 本ユーザのmt4ユーザアカウントを取得
            $thisUserWithEquity = self::GetThisUserWithEquity($usersWithEquity, $account_number);
            
            // 本ユーザのmt4ユーザアカウントが存在していて、未有効化グループに属す場合には
            if($thisUserWithEquity != null && $thisUserWithEquity["group"] == MT4API::GetInvalidAccountGroup())
            {
                // goodenoughのユーザを無効に変更
                $user->valid = false;
                $user->save();

                echo("success!");
            }
        }
    }


    public function manualActivateAccount(Request $request)
    {
        $activate_account_number = $request->activate_account_number;

        // 未有効ユーザ取得
        $users = User::where("valid", 0)
        ->where('account_number', $activate_account_number)
        ->get();

        // mt4ユーザアカウント
        $usersWithEquityInJson = $result = '[{"login":'.$activate_account_number.',"group":"TASDDBTC-000","balance":"20010.00","credit":"0.00","equity":"20010.00","margin":"0.00","freeMargin":"20010.00"}]';
        $usersWithEquity = json_decode($usersWithEquityInJson, true);
        
        // 未有効ユーザ各各に対して、
        foreach($users as $user)
        {
            // 本ユーザの口座番号を取得
            $account_number = self::GetAccountNumber($user);

            // 本ユーザのmt4ユーザアカウントを取得
            $thisUserWithEquity = self::GetThisUserWithEquity($usersWithEquity, $account_number);
            
            // 本ユーザのmt4ユーザアカウントが存在していて、未有効化グループに属していない場合には
            if($thisUserWithEquity != null && $thisUserWithEquity["group"] != MT4API::GetInvalidAccountGroup())
            {
                if($user->old_name != "running")
                {
                    //口座番号から、口座詳細取得
                    if( strlen($account_number)==6 ){
                        $this_user_account_info = Account::find($account_number);
                    }else{
                        $this_user_account_info = Account::Where("account_number",$account_number)->first();
                    }
                    $details = json_decode($this_user_account_info->detail, true);
                    if(isset($details['company']))
                    {
                        $kind = '法人';
                    }else
                    {
                        $kind = '個人';
                    }


                    // 本ユーザのパスワードを変更して、そのパスワードを、口座番号とともにユーザに通知

                    // パスワード発行
                    $password = self::random();

                    // mt4パスワードをこれに変更
                    $result = MT4API::changePassword($account_number, $password);

                    // goodenoughのログインパスワードをこれに変更
                    $hashedNewPassword = Hash::make($password);
                    $user->password = $hashedNewPassword;
                    $user->old_name = "running";

                    // goodenough affiliate の方のパスワードも変更
                    $affiliateUser = Affiliateusers::Where("account_number",$account_number)->first();
                    if($affiliateUser != null)
                    {
                        $affiliateUser->password = $hashedNewPassword;
                        $affiliateUser->save();
                        echo("save;");
                    }

                    // パスワードをユーザに通知
                    self::sendMailForNotificateLoginInfo($user->email, $details['backend']['user']['name'], $account_number, $password, $kind, $thisUserWithEquity["group"], false, $affiliateUser);

                    $uneiEmail = EmailTemplate::personalAccountRegistration;
                    if(isset($details['company']))
                    {
                        $uneiEmail = EmailTemplate::corporateAccountRegistration;
                    }

                    //運営用（情報を通知）
                    self::sendMailForNotificateLoginInfo($uneiEmail, $details['backend']['user']['name'], $account_number, $password, $kind, $thisUserWithEquity["group"], true, $affiliateUser);

                    echo("initial_success!");
                }

                $user->valid = true;
                $user->save();

                echo("success!");

            }
        }

        
    }

    private function sendMailForNotificateLoginInfo($to, $name, $login, $password, $kind, $groupName, $doToUnei, $affiliateUser){

        // アフィリエイタ専用口座の有効化時限定
        if($affiliateUser != null && $affiliateUser->tier != 5)
        {
            if($affiliateUser->affiligroup == MT4API::GetNormalAffiliatorAffiliGroup())
            {
                // 一般アフィリエイタの場合
                $special = "";
                $subject = "アフィリエイトパートナー登録完了通知";

                if($doToUnei)
                {
                    $to = EmailTemplate::partner;
                }

            }else
            {
                // スペシャルアフィリエイタの場合
                $special = "スペシャル";
                $subject = "スペシャルアフィリエイトパートナー登録完了通知";

                if($doToUnei)
                {
                    $to = EmailTemplate::specialPartner;
                }
            }
            
            $from = EmailTemplate::sendnotificationEmail;

            $body = EmailTemplate::notificateAffiliateUserLoginInfo($name,$login, $password, $kind, $special, $affiliateUser->affilicode);
            $noreplyFooter = EmailTemplate::noreplyFooter();
            $signature = EmailTemplate::signature();

            $mailbodyArray = array($body, $noreplyFooter, $signature);

            $mailbody = implode("\n\n", $mailbodyArray);

            $suc = EmailTemplate::executeSendEmail($to, $subject, $mailbody, $from);

            return;
        }

        /*
        
        // MAM口座の有効化時限定
        if(substr($groupName, -2) == "-S")
        {
            // 件名と送り主
            $subject = "【good enough】".$kind."口座登録完了通知とMAM口座に関して";
            $from = EmailTemplate::sendnotificationEmail;

            // $mailbody: 
            $body = EmailTemplate::mamEmailNotificateLoginInfo($name,$login, $password, $kind);
            $noreplyFooter = EmailTemplate::noreplyFooter();
            $signature = EmailTemplate::signature();
            $mailbodyArray = array($body, $noreplyFooter, $signature);
            $mailbody = implode("\n\n", $mailbodyArray);

            // 送信先: 顧客へ送るモードの時は与えられた引数そのまま、運営へ送るモードの時は、MAM通知用の口座へ送る
            if($doToUnei)
            {
                $to = EmailTemplate::mamNotification;
            }

            $suc = EmailTemplate::executeSendEmail($to, $subject, $mailbody, $from);

            return;
        }

        */

        $subject = "【good enough】".$kind."口座登録完了通知";
        $from = EmailTemplate::sendnotificationEmail;

        $body = EmailTemplate::notificateLoginInfo($name,$login, $password, $kind);
        $noreplyFooter = EmailTemplate::noreplyFooter();
        $signature = EmailTemplate::signature();

        $mailbodyArray = array($body, $noreplyFooter, $signature);

        $mailbody = implode("\n\n", $mailbodyArray);

        $suc = EmailTemplate::executeSendEmail($to, $subject, $mailbody, $from);
    }

    private function random($length = 8)
    {
        return substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, $length);
    }

    private function GetThisUserWithEquity($usersWithEquity, $account_number)
    {
        $thisUserWithEquity = null;
        foreach($usersWithEquity as $userWithEquity)
        {
            if($userWithEquity["login"] == $account_number)
            {
                $thisUserWithEquity = $userWithEquity;
            }
        }
        return $thisUserWithEquity;
    }

    private function GetAccountNumber($user)
    {
        // ログインネームから、口座番号取得
        $login_user_name = $user->name;
        $login_user_info = explode("-", $login_user_name);
        $account_number = $login_user_info[1];

        return $account_number;
    }

    public function closedOrders(Request $request)
    {
        $closedOrdersInJson = MT4API::closedOrders($request->login);

        echo($closedOrdersInJson);
    }

    public function usersWithEquity(Request $request)
    {
        $closedOrdersInJson = MT4API::usersWithEquity();

        echo($closedOrdersInJson);
    }

    public function createRealUser(Request $request)
    {
        $result = MT4API::createRealUser();

        echo($result);
    }

    public function download1()
    {
        return view('sample.download');
    }

    public function download2(Request $request, Response $response)
    {
        $this->sendHeader($response, 'sample.txt', 'text/plain');

        $login = $request->login;

        $closedOrdersInJson = MT4API::closedOrders($login);

        $closedOrders = json_decode($closedOrdersInJson, true);

        if($closedOrders == null)
        {
            $closedOrders = [];
        }

        for ($i = 0; $i < count($closedOrders); $i++) {
            $isBalance = !array_key_exists('volume', $closedOrders[$i] );
            if($isBalance)
            {
                $closedOrders[$i]['volume'] = '';
                $closedOrders[$i]['symbol'] = '';
                $closedOrders[$i]['open_price'] = '';
                $closedOrders[$i]['SL'] = '';
                $closedOrders[$i]['TP'] = '';
                $closedOrders[$i]['close_price'] = '';
                $closedOrders[$i]['swap'] = '';
            }
        }

        $cols = ['order', 'open_time', 'type', 'volume', 'symbol', 'open_price', 'SL', 'TP', 'close_time', 'close_price', 'commission', 'swap', 'profit'];

        for ($row = 0; $row < count($closedOrders); $row++) {

            $line = '';
            for ($col = 0; $col < 10; $col++) {
                $line .= $closedOrders[$row][$cols[$col]];
                $line .= ",";
            }
            $line .= "\n";

            $this->sendContentBody($line);

        }

        $this->sendContentEnd();

        exit;
    }

    private function sendHeader($response, $fileName, $mimeType){

        $response->setProtocolVersion('1.1');
        $response->headers->replace([
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
            'Transfer-Encoding' => 'chunked'
        ]);
        $response->sendHeaders();

        ob_flush();
        flush();

    }

    private function sendContentBody($line){

        echo dechex(strlen($line));
        echo "\r\n";
        echo $line;
        echo "\r\n";

        ob_flush();
        flush();
    }

    private function sendContentEnd(){

        echo '0';
        echo "\r\n";
        echo "\r\n";

        ob_flush();
        flush();

    }

    public function syncPassword(Request $request)
    {
        $users = User::get();
        
        foreach($users as $user)
        {
            // 口座番号取得
            $login_user_info = explode("-",$user->name);
            $account_number = $login_user_info[1];

            // 口座番号が同じのaffiliateuserを取得
            $affiliateUser = Affiliateusers::Where("account_number",$account_number)->first();
            
            // 口座番号が同じのaffiliateuserがいれば、パスワードを同期する
            if($affiliateUser != null)
            {
                $hashedNewPassword = $user->password;
                $affiliateUser->password = $hashedNewPassword;
                $affiliateUser->save();
                echo("save;");
            }
        }
    }

    // サンクスページをデザイン的に確認するためにgetリクエストで仮文言(個人口座開設時のもの)で表示可能にしたもの
    public function thanks(Request $request)
    {
        // 共通部分表示に使用する情報
        $global = GlobalVariable::get_global_variable();
        $thanks_messsage1 = 'この度は GOOD ENOUGH にご登録いただき、誠にありがとうございます。';
        $thanks_messsage2 = '３営業日ほど審査にお時間をいただくことをご了承ください';

        return view('thanks')->with([
            "global" => $global,
            "thanks_messsage1" => $thanks_messsage1,
            "thanks_messsage2" => $thanks_messsage2,
         ]);
    }
}
