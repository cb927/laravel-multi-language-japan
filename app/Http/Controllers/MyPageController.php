<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Account;
use App\Mt4GroupUserInfo;
use \GuzzleHttp\Client;
use App\Library\EmailTemplate;
use App\Library\MT4API;
use App\Library\CalcUsingClosedOrders;
use App\Affiliateusers;
use App\Library\HttpRequest;
use App\Library\GlobalVariable;
use App\Library\PersonalPageVariable;
use App\Bank;
    

class MyPageController extends Controller
{
    public function index(Request $request)
    {
        if(!Auth::check()) return redirect(route('mt4login'));
        
        $data = self::Summary($request);

        return view('my_page.my-page')->with($data);
    }

    public function history(Request $request) {
        if(!Auth::check()) return redirect(route('mt4login'));
        $data = self::History2($request);
        
        return view('my_page.history')->with($data);
    }

    public function deposit(Request $request) {
        if(!Auth::check()) return redirect(route('mt4login'));
        
        $data = self::DepositsAndWithdrawals($request);
        
        return view('my_page.deposit')->with($data);
    }

    public function transfer(Request $request) {
        if(!Auth::check()) return redirect(route('mt4login'));
        
        $data = self::Transfer2($request);
        
        return view('my_page.transfer')->with($data);
    }

    public function additional(Request $request) {
        if(!Auth::check()) return redirect(route('mt4login'));
        
        $data = self::AddAccount($request);
        
        return view('my_page.additional')->with($data);
    }

    public function setting(Request $request) {
        if(!Auth::check()) return redirect(route('mt4login'));

        $google2fa_url = asset('GoogleAuthenticator');
        $username = Auth::user()->name;
        $google2fa_secret = Auth::user()->google2fa_secret;
        
        $data = self::Setting2($request);
        $data["google2fa_url"] = $google2fa_url;
        $data["username"] = $username;
        $data["google2fa_secret"] = $google2fa_secret;
        
        return view('my_page.setting')->with($data);
    }

    public function setting1(Request $request) {
        if(!Auth::check()) return redirect(route('mt4login'));

        $google2fa_url = asset('GoogleAuthenticator');
        $username = Auth::user()->name;
        $google2fa_secret = Auth::user()->google2fa_secret;
        
        $data = self::Setting2($request);
        $data["google2fa_url"] = $google2fa_url;
        $data["username"] = $username;
        $data["google2fa_secret"] = $google2fa_secret;
        
        return view('my_page.setting1')->with($data);
    }

    public function setting_mam()
    {
        return view('my_page.setting_mam');
    }

    public function mam_success()
    {
        return view('my_page.success.mam');
    }


    public function aff_partner()
    {
        return view('my_page.aff_partner');
    }

    public function aff_spec_partner()
    {
        return view('my_page.aff_spec_partner');
    }

    public function aff_success()
    {
        return view('my_page.success.aff');
    }

    public function aff_spec_success()
    {
        return view('my_page.success.aff_spec');
    }

    public function depositCryptocurrency(Request $request) {
        if(!Auth::check()) return redirect(route('mt4login'));
        
        $data = self::DepositsAndWithdrawals($request);
        
        return view('my_page.deposit_cryptocurrency')->with($data);
    }

    public function depositCredit(Request $request) {
        if(!Auth::check()) return redirect(route('mt4login'));
        
        $data = self::DepositsAndWithdrawals($request);
        
        return view('my_page.deposit_credit')->with($data);
    }

    public function depositWithdrawal(Request $request) {
        if(!Auth::check()) return redirect(route('mt4login'));
        
        $data = self::DepositsAndWithdrawals($request);

        $account_number = self::getLoginAccountInfo();
        $banks = Bank::Where("mt4_account_number", $account_number)->get();
        $data["banks"] = $banks;
        
        return view('my_page.deposit_withdrawal')->with($data);
    }

    public function depositWithdrawalViaCredit(Request $request) {
        if(!Auth::check()) return redirect(route('mt4login'));
        
        $data = self::DepositsAndWithdrawals($request);
        
        return view('my_page.deposit_withdrawal_credit')->with($data);
    }












    private function getLoginAccountInfo()
    {
        $login_user_name = Auth::user()->name;
        $login_user_info = explode("-",$login_user_name);
        $account_number = $login_user_info[1];

        return $account_number;
    }

    protected function GetAccountInfo()
    {
        $login_user_name = Auth::user()->name;
        $valid = Auth::user()->valid;

        //ログイン情報から、プラットフォームと口座番号取得
        $login_user_info = explode("-",$login_user_name);
        $platform = $login_user_info[0];
        $account_number = $login_user_info[1];
        
        //口座番号から、口座詳細取得
        if($valid == 0 && strlen($account_number)==6 ){
            $this_user_account_info = Account::find($account_number);
        }else{
            $this_user_account_info = Account::Where("account_number",$account_number)->first();
        }
        $details = json_decode($this_user_account_info->detail, true);

        // 口座番号と初回接続日時の情報(Usersテーブルから取得したもの)を、$detailsに追加する
        $details["account_number"] = $account_number;
        $details["created_at"] = Auth::user()->created_at;

        // mt4 group と紐づく情報を取得し、$detailsに追記
        $mt4group = MT4API::GetTheUserWithEquity($account_number);
        $mt4GroupUserInfo = Mt4GroupUserInfo::Where("mt4group", $mt4group["group"])->first();

        if($mt4GroupUserInfo == null)
        {
            $details["leverage"] = "未設定";
            $details["status"]  = "Active";
            $details["history_disabled"]  = true;
        }else
        {
            $details["leverage"] =  $mt4GroupUserInfo->leverage;
            $details["status"]  =  $mt4GroupUserInfo->status;
            $details["history_disabled"]  = false;
        }

        return $details;
    }

    protected function GetThisUserAccountInfo()
    {
        $login_user_name = Auth::user()->name;
        $valid = Auth::user()->valid;

        //ログイン情報から、プラットフォームと口座番号取得
        $login_user_info = explode("-",$login_user_name);
        $platform = $login_user_info[0];
        $account_number = $login_user_info[1];
        
        //口座番号から、口座詳細取得
        if($valid == 0 && strlen($account_number)==6 ){
            $this_user_account_info = Account::find($account_number);
        }else{
            $this_user_account_info = Account::Where("account_number",$account_number)->first();
        }
        
        return $this_user_account_info;
    }

    protected function GetAccountNyukingaku()
    {
        $login_user_name = Auth::user()->name;
        $valid = Auth::user()->valid;

        //ログイン情報から、プラットフォームと口座番号取得
        $login_user_info = explode("-",$login_user_name);
        $platform = $login_user_info[0];
        $account_number = $login_user_info[1];
        
        //口座番号から、口座詳細取得
        if($valid == 0 && strlen($account_number)==6 ){
            $this_user_account_info = Account::find($account_number);
        }else{
            $this_user_account_info = Account::Where("account_number",$account_number)->first();
        }

        return $this_user_account_info->nyukingaku;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function Summary(Request $request)
    {
        // 本ページの表示に使用する情報
        $details = PersonalPageVariable::GetAccountInfo();
        $thisUserWithEquity = self::get_thisUserWithEquity_for_summarypage($details["account_number"]);
        $summary_main_table_body = self::summary_main_table_body($details, $thisUserWithEquity);

        // 共通部分表示に使用する情報
        $global = GlobalVariable::get_global_variable();
        $personal = PersonalPageVariable::get_personalpage_variable();

        return [
            "summary_main_table_body" => $summary_main_table_body,
            "global" => $global,
            "personal" => $personal,
        ];
    }

    private function summary_main_table_body($details, $thisUserWithEquity)
    {
        $table_body = [];

       

        $table_body2 = [];
        $table_body2[] = '口座番号';
        $table_body2[] = $thisUserWithEquity["login"];
        $table_body[] = $table_body2;

        $table_body2 = [];
        $table_body2[] = '口座残高';
        $table_body2[] = $thisUserWithEquity["balance"];
        $table_body[] = $table_body2;

        $table_body2 = [];
        $table_body2[] = '有効証拠金';
        $table_body2[] = $thisUserWithEquity["equity"];
        $table_body[] = $table_body2;

        $table_body2 = [];
        $table_body2[] = '必要証拠金';
        $table_body2[] = $thisUserWithEquity["margin"];
        $table_body[] = $table_body2;

        $table_body2 = [];
        $table_body2[] = '余剰証拠金';
        $table_body2[] = $thisUserWithEquity["yojou"];
        $table_body[] = $table_body2;

        $table_body2 = [];
        $table_body2[] = '証拠金維持率';
        $table_body2[] = $thisUserWithEquity["iziritu"];
        $table_body[] = $table_body2;

        $table_body2 = [];
        $table_body2[] = 'ステータス';
        $table_body2[] = $details["status"];
        $table_body[] = $table_body2;
        

        return $table_body;
    }

    private function get_thisUserWithEquity_for_summarypage($login)
    {
        // $usersWithEquity取得
        $usersWithEquityInJson = MT4API::usersWithEquity();
        $usersWithEquity = json_decode($usersWithEquityInJson, true);

        $thisUserWithEquity = null;
        foreach($usersWithEquity as $userWithEquity)
        {
            if($userWithEquity['login'] == $login)
            {
                $thisUserWithEquity = $userWithEquity;
            }
        }

        if($thisUserWithEquity == null)
        {
            $thisUserWithEquity['iziritu'] = '-';
            $thisUserWithEquity['yojou'] = '-';
            $thisUserWithEquity['margin'] = '-';
            $thisUserWithEquity['equity'] = '-';
            $thisUserWithEquity['balance'] = '-';
            $thisUserWithEquity['login'] = '-';
        }else
        {
            $thisUserWithEquity['yojou'] = $thisUserWithEquity['equity'] - $thisUserWithEquity['margin'];

            if($thisUserWithEquity['equity'] == 0)
            {
                $thisUserWithEquity['iziritu'] = '-';
            }else{
                $thisUserWithEquity['iziritu'] = $thisUserWithEquity['yojou']/$thisUserWithEquity['equity'] * 100;
            }
        }

        return $thisUserWithEquity;
    }

    public function History2(Request $request)
    {
        if(!Auth::check()){
            return redirect(route('mt4login'));
        }

        // 共通部分表示に使用する情報
        $global = GlobalVariable::get_global_variable();
        $personal = PersonalPageVariable::get_personalpage_variable();
        // $historyInfo = self::getHistoryInfo($request);

        return [
            "global" => $global,
            "personal" => $personal,
            // "historyInfo" => $historyInfo,
        ];
    }

    private function getHistoryInfo(Request $request)
    {
        // ログインアカウントの詳細情報取得
        $details = self::GetAccountInfo();

        // ログインNoを用いて発注情報取得
        $login = $details["account_number"];
        $closedOrdersInJson = MT4API::closedOrders($login);

        $closedOrders = json_decode($closedOrdersInJson, true);

        if($closedOrders == null)
        {
            $closedOrders = [];
        }

        // レコードのtypeがbalanceの場合、不足列があるので補う
        $closedOrders = self::compensateColForBalanceRecords($closedOrders);

        $calcUsingClosedOrders = new CalcUsingClosedOrders($closedOrders);

        //ページングに必要な値を取得
        $pageNum = $request->page;
        $recordNumPerPage = 25;
        $startRecordNum = ($pageNum-1) * $recordNumPerPage;
        $maxPageNum = ceil(count($closedOrders) / $recordNumPerPage);

        // ページング範囲のみを抽出
        $closedOrders = array_slice($closedOrders, $startRecordNum, $recordNumPerPage );

        return (object) [
            'calcUsingClosedOrders' => $calcUsingClosedOrders,
            'closedOrders' => $closedOrders,
            'pageNum' => $pageNum,
            'maxPageNum' => $maxPageNum,
            'login' => $login,
        ];
    }

    private function compensateColForBalanceRecords($closedOrders)
    {
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

        return $closedOrders;
    }

    public function DepositsAndWithdrawals(Request $request)
    {
        if(!Auth::check()){
            return redirect(route('mt4login'));
        }

        $type = $request->type ?? "banks";
        $withdraw_type = $request->withdraw_type ?? "banks";

        // 共通部分表示に使用する情報
        $global = GlobalVariable::get_global_variable();
        $personal = PersonalPageVariable::get_personalpage_variable();

        $depositCryptCurrencyInfo = self::getDepositAddressInfo();

        $account_number = self::getLoginAccountInfo();

        
        $banks = Bank::Where('mt4_account_number', Auth::user()->account_number);

        return [
            "type" => $type,
            "withdraw_type" => $withdraw_type,

            "global" => $global,
            "personal" => $personal,

            "depositCryptCurrencyInfo" => $depositCryptCurrencyInfo,

            "banks" => $banks,

            "account_number" => $account_number,
         ];
    }

    private function getDepositAddressInfo()
    {
        $depositCryptCurrencyInfo = [];

        $depositCryptCurrencyInfo[]  =  (object) [
            'name'   => 'bitcoin',
            'img' => asset('images/bitcoin.png'),
            'address' => 'bitcoin_addresstest',
        ];

        $depositCryptCurrencyInfo[]  =  (object) [
            'name'   => 'ethereum',
            'img' => asset('images/ethereum.png'),
            'address' => 'ethereum_addresstest',
        ];

        $depositCryptCurrencyInfo[]  =  (object) [
            'name'   => 'bitcoincash',
            'img' => asset('images/bitcoincash.png'),
            'address' => 'bitcoincash_addresstest',
        ];

        $depositCryptCurrencyInfo[]  =  (object) [
            'name'   => 'tether',
            'img' => asset('images/tether.png'),
            'address' => 'tether_addresstest',
        ];

        return $depositCryptCurrencyInfo;
    }

    public function WithdrawalApplication(Request $request)
    {
        $account = self::GetThisUserAccountInfo();
        $email = $account->email;
        $name = $account->name;
        $account_number = $account->account_number;
        
        $bank = Bank::find($request->bankid);

        if($request->howdo == "bank"){
            self::sendMailForTellingBankWithdrawalToCustomer($email, $name, $request->howmuch);
            self::sendMailForTellingBankWithdrawalToOperator($account_number, $email, $request->howmuch, $bank, $name);
        }else{
            self::sendMailForTellingWithdrawalToCustomer($email, $name, $request->howdo, $request->howmuch, $request->receiver_cryptaddress);
            self::sendMailForTellingWithdrawalToOperator($account, $request->howmuch, $request->howdo, $request->receiver_cryptaddress, $name);
        }

        // 共通部分表示に使用する情報
        $global = GlobalVariable::get_global_variable();
        $personal = PersonalPageVariable::get_personalpage_variable();
        $thanks_messsage1 = '出勤申請いただき、誠にありがとうございます。';
        $thanks_messsage2 = '２営業日以内にメールにてご連絡致します';

        return view('thanks')->with([
            "global" => $global,
            "personal" => $personal,
            "thanks_messsage1" => $thanks_messsage1,
            "thanks_messsage2" => $thanks_messsage2,
         ]);
    }

    public function DepositApplication(Request $request)
    {
        if(!Auth::check()){
            return redirect(route('mt4login'));
        }

        // dd("入金申請を行う");
        $formInfo = $request->all();
        self::sendMailForTellingDepositApplyFinishedToCustomer($request->email);
        self::sendMailForTellingDepositApplyFinishedToUnei($formInfo);

        $details = self::GetAccountInfo();

        $currentPath = asset('static')."/ja/accounts/DepositsAndWithdrawals";
        $thisRouteName = 'deposit';
        $tempRefPath = asset('static')."/ja/forms/accounts";


        $type = $request->type ?? "credit_card";
        $kind = $request->kind ?? null;
        $detail = $request->detail ?? null;
        return view('personal.DepositsAndWithdrawals')->with([
            "currentPath" => $currentPath,
            "thisRouteName" => $thisRouteName,
            "inqueryComplete" => $request->inqueryComplete,
            "type" => $type,
            "kind" => $kind,
            "detail" => $detail,
            "details" => $details,
            "tempRefPath" => $tempRefPath,
         ]);
    }

    public function Setting2(Request $request)
    {
        if(!Auth::check()){
            return redirect(route('mt4login'));
        }

        // 共通部分表示に使用する情報
        $global = GlobalVariable::get_global_variable();
        $personal = PersonalPageVariable::get_personalpage_variable();

        return [
            "global" => $global,
            "personal" => $personal,
        ];
    }

    public function SettingConfirm(Request $request)
    {
        $global = GlobalVariable::get_global_variable();
        $thanks_messsage1 = '出金申請を受け付けいたしました。３営業日以内に処理を致します。';
        $thanks_messsage2 = '今しばらくお待ちいただきますようお願い致します。（土日を挟む場合を除く）';

        return view('thanks')->with([
          "global" => $global,
          "thanks_messsage1" => $thanks_messsage1,
          "thanks_messsage2" => $thanks_messsage2,
         ]);
    }

    public function twoFactorAuthenticate(Request $request)
    {
        $google2fa_login_url = asset('GoogleAuthenticator')."/login.php";

        $parameter = "?secret=".$request->secret."&oneCode=".$request->oneCode;

        $google2fa_secret = HttpRequest::GetRequest($google2fa_login_url.$parameter);


        // 認証成功の場合、2段階認証のonoffを切り替える
        $login_user = Auth::user();
        if($google2fa_secret == 'OK'){
            if($login_user->google2fa_valid)
            {
                $login_user->google2fa_valid = false;
            }
            else
            {
                $login_user->google2fa_valid = true;
            }
        }
        $login_user->save();

        return redirect(route('setting'));
    }

    public function switchTwoFactorAuthenticate(Request $request)
    {
        $login_user = Auth::user();

        $login_user->google2fa_valid = $request->isActivate;

        $login_user->save();

        return redirect(route('setting2'));
    }

    public function Transfer2(Request $request)
    {
        if(!Auth::check()){
            return redirect(route('mt4login'));
        }

        // 共通部分表示に使用する情報
        $global = GlobalVariable::get_global_variable();
        $personal = PersonalPageVariable::get_personalpage_variable();
        $loginUserPassword = Auth::user()->password;

        return [
            "global" => $global,
            "personal" => $personal,
            "loginUserPassword" => $loginUserPassword,
        ];
    }

    public function TransferConfirm(Request $request)
    {
        $global = GlobalVariable::get_global_variable();
        $thanks_messsage1 = '出金申請を受け付けいたしました。３営業日以内に処理を致します。';
        $thanks_messsage2 = '今しばらくお待ちいただきますようお願い致します。（土日を挟む場合を除く）';

        return view('thanks')->with([
          "global" => $global,
          "thanks_messsage1" => $thanks_messsage1,
          "thanks_messsage2" => $thanks_messsage2,
         ]);
    }

    public function AddAccount(Request $request)
    {
        if(!Auth::check()){
            return redirect(route('mt4login'));
        }

        // 共通部分表示に使用する情報
        $global = GlobalVariable::get_global_variable();
        $personal = PersonalPageVariable::get_personalpage_variable();
        $account_number = self::getLoginAccountInfo();
        $this_user_account_info = Account::Where("account_number",$account_number)->first();

        return [
            "global" => $global,
            "personal" => $personal,
            "this_user_account_info" => $this_user_account_info,
        ];
    }

    public function AddAccountRegister(Request $request)
    {
        if(!Auth::check()){
            return redirect(route('mt4login'));
        }

        $currentPath = asset('static')."/ja/forms/accounts/individual-confirm";
        $tempRefPath = asset('static')."/ja/forms/accounts";
        // 共通部分表示に使用する情報
        $global = GlobalVariable::get_global_variable();
        $thanks_messsage1 = '出金申請を受け付けいたしました。３営業日以内に処理を致します。';
        $thanks_messsage2 = '今しばらくお待ちいただきますようお願い致します。（土日を挟む場合を除く）';

        return view('thanks')->with([
            "currentPath" => $currentPath,
            "tempRefPath" => $tempRefPath,
            "global" => $global,
            "thanks_messsage1" => $thanks_messsage1,
            "thanks_messsage2" => $thanks_messsage2,
         ]);
    }

    public function MamConsent(Request $request)
    {
        if(!Auth::check()){
            return redirect(route('mt4login'));
        }



        $login_user_name = Auth::user()->name;
        $login_user_info = explode("-",$login_user_name);
        $account_number = $login_user_info[1];
        $this_user_account_info = Account::Where("account_number",$account_number)->first();


        // ログインユーザの口座番号が、Affiliateusersテーブルにあれば取得。なければその旨表示して終了
        $affiliateuser = Affiliateusers::Where("account_number", $account_number)->first();
        if($affiliateuser == null)
        {
            dd("本口座は、MAM口座申請対象ではありません");
        }

        // ログインユーザのアフィリエイトグループのtier1ユーザの情報を取得 (このtier1がmam運用者になる)
        $affiligroup = $affiliateuser->affiligroup;
        $tier1Affiliateuser = Affiliateusers::Where("account_number", $affiligroup)->first();


        $currentPath = asset('static')."/ja/forms/accounts/individual-confirm";
        $tempRefPath = asset('static')."/ja/forms/accounts";

        return view('mam_consent')->with([
            "currentPath" => $currentPath,
            "tempRefPath" => $tempRefPath,
            "this_user_account_info" => $this_user_account_info,
            "tier1Affiliateuser" => $tier1Affiliateuser,
         ]);
    }

    public function MamConsentConfirm()
    {
        $login_user_name = Auth::user()->name;
        $login_user_info = explode("-",$login_user_name);
        $account_number = $login_user_info[1];

        self::sendMailForTellingMAMConsentFinishedToUnei($account_number);

        return redirect(route('mam=consent'));
    }

    public function AddBank(Request $request)
    {
        Bank::Create([
            'mt4_account_number' => self::getLoginAccountInfo(),
            'bank_account_name' => $request->bank_account_name,
            'bank_account_address' => $request->bank_account_address,
            'bank_account_number' => $request->bank_account_number,
            'bank_name' => $request->bank_name,
            'bank_branch' => $request->bank_branch,
            'bank_kind' => $request->bank_kind,
        ]);

        return redirect(route('depositWithdrawal'));
    }

    private function sendMailForTellingMAMConsentFinishedToUnei($account_number){
                
        $subject = "MAM同意受付";
        $from = EmailTemplate::sendnotificationEmail;
        $to = EmailTemplate::testAddress;
 
        $cryptWithdrawalToCustomer = EmailTemplate::TellingMAMConsentFinishedToUnei($account_number);

        $mailbodyArray = array($cryptWithdrawalToCustomer);

        $mailbody = implode("\n\n", $mailbodyArray);

        $suc = EmailTemplate::executeSendEmail($to, $subject, $mailbody, $from);
    }

    /** 以下、保留中であるが、追加口座申請時に使用予定のもの */

    /*
    public function sendMailForNotification($to, $name, $content){
        ini_set('display_errors', "On");
        mb_language("Japanese");
        mb_internal_encoding("UTF-8");
        
        $subject = "【good enough】問い合わせの通知";
        $from = "From: ".mb_encode_mimeheader('good enough')."<sendnotification@good-enough.com>";

// テンプレートからメール本文の読み込み
$mailbody = '
お名前：%name%
Eメールアドレス：%email%

お問い合わせ内容：
%content%
';

        // 本文の文字列置き換え
        $mailbody = str_replace ("%name%", $name, $mailbody);
        $mailbody = str_replace ("%email%", $to, $mailbody);
        $mailbody = str_replace ("%content%", $content, $mailbody);

        $mailbody = mb_convert_encoding ($mailbody, "iso-2022-jp", "UTF-8");

        $suc = mb_send_mail($to, $subject, $mailbody, $from);
    }

    public function sendMail($to, $name, $content){
        ini_set('display_errors', "On");
        mb_language("Japanese");
        mb_internal_encoding("UTF-8");
        
        $subject = "【good enough】問い合わせ内容の確認";
        $from = "From: ".mb_encode_mimeheader('good enough')."<sendnotification@good-enough.com>";

// テンプレートからメール本文の読み込み
$mailbody = '
%name%様

日頃よりgood enoughをご利用いただき誠にありがとうございます。
good enoughサポートでございます。

Eメールアドレス：%email%

お問い合わせ内容：
%content%

返信まで今しばらくお待ちください。
お問い合わせをいただいた日を除く原則3営業日以内に返信致します。

今後とも good enough をよろしくお願いいたします。

--------------------------------------------------
株式会社good enough
ユーザーサポート部門
よくある質問：%faqurl%
HP: %topurl%
--------------------------------------------------
';

        // 本文の文字列置き換え
        $mailbody = str_replace ("%name%", $name, $mailbody);
        $mailbody = str_replace ("%email%", $to, $mailbody);
        $mailbody = str_replace ("%content%", $content, $mailbody);
        $mailbody = str_replace ("%faqurl%", route('faq'), $mailbody);
        $mailbody = str_replace ("%topurl%", route('top'), $mailbody);

        $mailbody = mb_convert_encoding ($mailbody, "iso-2022-jp", "UTF-8");

        $suc = mb_send_mail($to, $subject, $mailbody, $from);
    }
    */

    private function sendMailForTellingDepositApplyFinishedToCustomer($to){

        $subject = "GOOD ENOUGH・入金処理の完了のお知らせ";
        $from = EmailTemplate::sendnotificationEmail;
 
        $cryptWithdrawalToCustomer = EmailTemplate::TellingDepositApplyFinishedToCustomer();

        $mailbodyArray = array($cryptWithdrawalToCustomer);

        $mailbody = implode("\n\n", $mailbodyArray);

        $suc = EmailTemplate::executeSendEmail($to, $subject, $mailbody, $from);
    }

    private function sendMailForTellingDepositApplyFinishedToUnei($formInfo){

        $subject = "GOOD ENOUGH・入金受付";
        $from = EmailTemplate::sendnotificationEmail;
        $to = EmailTemplate::withdrawalDeposit;
 
        $cryptWithdrawalToCustomer = EmailTemplate::TellingDepositApplyFinishedToUnei($formInfo);

        $mailbodyArray = array($cryptWithdrawalToCustomer);

        $mailbody = implode("\n\n", $mailbodyArray);

        $suc = EmailTemplate::executeSendEmail($to, $subject, $mailbody, $from);
    }

    private function sendMailForTellingWithdrawalToCustomer($to, $name, $how, $howmuch, $address){


        $subject = "GOOD ENOUGH・暗号資産出金申請の通知";
        $from = EmailTemplate::sendnotificationEmail;

        $header = EmailTemplate::header($name);
        $cryptWithdrawalToCustomer = EmailTemplate::cryptWithdrawalToCustomer($how, $howmuch, $address);
        $noreplyFooter = EmailTemplate::noreplyFooter($name);
        $signature = EmailTemplate::signature($name);

        $mailbodyArray = array($header, $cryptWithdrawalToCustomer, $noreplyFooter, $signature);

        $mailbody = implode("\n\n", $mailbodyArray);

        $suc = EmailTemplate::executeSendEmail($to, $subject, $mailbody, $from);
    }

    private function sendMailForTellingWithdrawalToOperator($account, $howmuch, $howdo, $address, $name){


        $subject = "GOOD ENOUGH・出金申請を受け付けました";
        $from = EmailTemplate::sendnotificationEmail;
        $to = EmailTemplate::withdrawalDepositEmail;

        $header = EmailTemplate::header($name);
        $cryptWithdrawalToOperator = EmailTemplate::cryptWithdrawalToOperator($account, $howmuch, $howdo, $address, $name);
        $noreplyFooter = EmailTemplate::noreplyFooter($name);
        $signature = EmailTemplate::signature($name);

        $mailbodyArray = array($cryptWithdrawalToOperator);

        $mailbody = implode("\n\n", $mailbodyArray);

        $suc = EmailTemplate::executeSendEmail($to, $subject, $mailbody, $from);
    }
    
    private function sendMailForTellingBankWithdrawalToCustomer($to, $name, $howmuch){


        $subject = "GOOD ENOUGH・銀行振込申請の通知";
        $from = EmailTemplate::sendnotificationEmail;

        $header = EmailTemplate::header($name);
        $cryptWithdrawalToCustomer = EmailTemplate::bankWithdrawalToCustomer($howmuch);
        $noreplyFooter = EmailTemplate::noreplyFooter($name);
        $signature = EmailTemplate::signature($name);

        $mailbodyArray = array($header, $cryptWithdrawalToCustomer, $noreplyFooter, $signature);

        $mailbody = implode("\n\n", $mailbodyArray);

        $suc = EmailTemplate::executeSendEmail($to, $subject, $mailbody, $from);
    }

    private function sendMailForTellingBankWithdrawalToOperator($accountnum, $email, $howmuch, $bank, $name){


        $subject = "GOOD ENOUGH・銀行振込申請の通知";
        $from = EmailTemplate::sendnotificationEmail;
        $to = EmailTemplate::withdrawalDepositEmail;

        $header = EmailTemplate::header($name);
        $cryptWithdrawalToOperator = EmailTemplate::bankWithdrawalToOperator($accountnum, $email, $howmuch, $bank, $name);
        $noreplyFooter = EmailTemplate::noreplyFooter($name);
        $signature = EmailTemplate::signature($name);

        $mailbodyArray = array($cryptWithdrawalToOperator);

        $mailbody = implode("\n\n", $mailbodyArray);

        $suc = EmailTemplate::executeSendEmail($to, $subject, $mailbody, $from);
    }
}
