<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Account;
use App\Affiliators;
use App\SpecialAffiliators;
use App\Affiliateusers;
use \GuzzleHttp\Client;
use App\Library\EmailTemplate;
use App\Affiliategroup;
use App\Library\TreeDiagram;
use App\Library\MT4API;
use App\Library\CreateAccount;

class AffiliateController extends Controller
{

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

        // 口座番号の情報(Usersテーブルから取得したもの)を、$detailsに追加する
        $details["account_number"] = $account_number;

        return $details;
    }

    protected function GetAccountDBInfo()
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

    protected function index(Request $request)
    {
        if(!Auth::check()){
            return redirect(route('mt4login'));
        }

        $currentPath = asset('static')."/ja/accounts/addaccount";
        $thisRouteName = 'addaccount';
        $tempRefPath = asset('static')."/ja/forms/accounts";

        $login_user = self::GetAccountDBInfo();

        return view('affiliate.index')->with([
            "currentPath" => $currentPath,
            "thisRouteName" => $thisRouteName,
            "inqueryComplete" => $request->inqueryComplete,
            "tempRefPath" => $tempRefPath,
            "login_user" => $login_user,
         ]);
    }

    protected function index2(Request $request)
    {

        $currentPath = asset('static')."/ja/accounts/addaccount";
        $thisRouteName = 'addaccount';
        $tempRefPath = asset('static')."/ja/forms/accounts";
        $ref_name = $request->ref;

        return view('affiliate.index2')->with([
            "currentPath" => $currentPath,
            "thisRouteName" => $thisRouteName,
            "inqueryComplete" => $request->inqueryComplete,
            "tempRefPath" => $tempRefPath,
            "ref_name" =>  $ref_name,
         ]);
    }

    protected function index2RegisterForm(Request $request)
    {

        $currentPath = asset('static')."/ja/accounts/addaccount";
        $thisRouteName = 'addaccount';
        $tempRefPath = asset('static')."/ja/forms/accounts";
        $ref_name = $request->ref;

        return view('affiliate.index2-register-form')->with([
            "currentPath" => $currentPath,
            "thisRouteName" => $thisRouteName,
            "inqueryComplete" => $request->inqueryComplete,
            "tempRefPath" => $tempRefPath,
            "ref_name" =>  $ref_name,
         ]);
    }

    protected function thanks(Request $request)
    {
        if(!Auth::check()){
            return redirect(route('mt4login'));
        }

        // ログインユーザの口座情報を取得
        $details = self::GetAccountInfo();
        $json = json_encode($details,JSON_PRETTY_PRINT);

        // 新規口座開設
        $personalOrCompanyInfo = self::extractPersonalOrCompanyInfo($details);
        $user = CreateAccount::GetTheUserWithEquity($details, $personalOrCompanyInfo->name, $personalOrCompanyInfo->company, $personalOrCompanyInfo->email);



        $login_user_info = explode("-",$user->name);
        $account_number = $login_user_info[1];

        // 上記を使って、Affiliatorsテーブルにレコード追加
        $affiliator = self::createRecordForOnlyNormalAffiliatorTable($details, $json, $user, $account_number);

         // 上記を使って、AffiliateUsersテーブルにレコード追加
        $affiliator = self::createNormalAffiliateUser($details, $json, $user, $account_number);

        // メール通知
        self::sendMailForTellingLoginInfo($affiliator->email, $affiliator->name);
        self::sendMailForTellingLoginInfoUnei($affiliator->name, $affiliator->email);

        // ビュー渡す
        $currentPath = asset('static')."/ja/accounts/addaccount";
        $thisRouteName = 'addaccount';
        $tempRefPath = asset('static')."/ja/forms/accounts";

        return view('affiliate.thanks')->with([
            "currentPath" => $currentPath,
            "thisRouteName" => $thisRouteName,
            "inqueryComplete" => $request->inqueryComplete,
            "tempRefPath" => $tempRefPath,
         ]);
    }

    private function extractPersonalOrCompanyInfo($all)
    {
        if(isset($all["company"]["name"]))
        {
            return (object) [
                'name'   => $all["company"]["name"] . " " . $all["company"]["type_business"],
                'company' => $all["company"]["name"],
                'email' => $all["company"]["email"],
            ];
        }else
        {
            return (object) [
                'name'   => $all["primary_holder"]["last_name"] . " " . $all["primary_holder"]["first_name"],
                'company' => null,
                'email' => $all["primary_holder"]["email"],
            ];
        }
    }

    private function insertIbNameBrank($details)
    {
        if($details["extra_information"]["ib_name"] == null)
        {
            $details["extra_information"]["ib_name"] = '';
        }

        return $details;
    }

    private function random($length = 8)
    {
        return substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, $length);
    }

    // details,json,Auth::user()->password, affilicode
    private function createNormalAffiliateUser($details, $json, $user, $account_number)
    {
        // 例外処理
        $details = self::insertIbNameBrank($details);
        
        // 紹介コードの生成
        $affilicode = self::random(10);

        // 一般アフィリエイターに対する、アフィリグループ名(id)、ティア、コミッションパーセントを取得
        $affiligroupid = MT4API::GetNormalAffiliatorAffiliGroup();
        $tier = 4;
        $affiligroup = Affiliategroup::Where("name", $affiligroupid)->first();
        $commission_percent = TreeDiagram::getCommissionPercent($tier, $affiligroup);

        // details,json,Auth::user()->password, affilicode,を使い、作成
        $affiliator = Affiliateusers::create([
            'account_number' => $account_number,
            'detail' => $json,
            'name' => $details["primary_holder"]["last_name"] . " " . $details["primary_holder"]["first_name"],
            'email' => $details["primary_holder"]["email"],
            'birthday' => $details["primary_holder"]["birth_year"] . "/" . $details["primary_holder"]["birth_month"] . "/" . $details["primary_holder"]["birth_day"],
            'tel' => $details["primary_holder"]["phone"],
            'password' => $user->password,
            'introducer' => $details["extra_information"]["ib_name"],
            'affilicode' => $affilicode,
            'affiligroup' => $affiligroupid,
            'tier' => $tier,
            'commission_percent' => $commission_percent,
            'platform' => $details["basic_information"]["platform"],
        ]);

        return $affiliator;
    }

    // details,json,Auth::user()->password, affilicode
    private function createRecordForOnlyNormalAffiliatorTable($details, $json, $user, $account_number)
    {
        $affiliator = Affiliators::create([
            'account_number' => $account_number,
            'detail' => $json,
            'name' => $details["primary_holder"]["last_name"] . " " . $details["primary_holder"]["first_name"],
            'email' => $details["primary_holder"]["email"],
            'birthday' => $details["primary_holder"]["birth_year"] . "/" . $details["primary_holder"]["birth_month"] . "/" . $details["primary_holder"]["birth_day"],
            'tel' => $details["primary_holder"]["phone"],
        ]);

        return $affiliator;
    }

    protected function thanks2(Request $request)
    {
        $all = $request->all();

        $code = $all["basic_information"]["code"];
        if($code == null)
        {
            $code = "";
        }

        $affiliator = SpecialAffiliators::create([
            'name' => $all["basic_information"]["name"],
            'email' => $all["basic_information"]["email"],
            'code' => $code,
        ]);

        self::sendMailForTellingLoginInfo2($affiliator->email, $affiliator->name);
        self::sendMailForTellingLoginInfoUnei2($affiliator->name, $affiliator->email, $affiliator->code);

        $currentPath = asset('static')."/ja/accounts/addaccount";
        $thisRouteName = 'addaccount';
        $tempRefPath = asset('static')."/ja/forms/accounts";

        return view('affiliate.thanks')->with([
            "currentPath" => $currentPath,
            "thisRouteName" => $thisRouteName,
            "inqueryComplete" => $request->inqueryComplete,
            "tempRefPath" => $tempRefPath,
         ]);
    }

    public function sendMailForTellingLoginInfoUnei2($name, $email, $code){

        $subject = "【good enough】スペシャルアフィリエイトパートナー申請情報";
        $from = EmailTemplate::sendnotificationEmail;
        $to = EmailTemplate::specialPartner;

        $cryptWithdrawalToCustomer = EmailTemplate::registerAsPartnerUnei2($name, $email, $code);
        $mailbodyArray = array($cryptWithdrawalToCustomer);
        $mailbody = implode("\n\n", $mailbodyArray);

        $suc = EmailTemplate::executeSendEmail($to, $subject, $mailbody, $from);

    }

    public function sendMailForTellingLoginInfo($to, $name){

        $subject = "【good enough】アフィリエイトパートナー申請の受付";
        $from = EmailTemplate::sendnotificationEmail;

        $header = EmailTemplate::header($name);
        $cryptWithdrawalToCustomer = EmailTemplate::registerAsPartner();
        $noreplyFooter = EmailTemplate::noreplyFooter($name);
        $signature = EmailTemplate::signature($name);

        $mailbodyArray = array($header, $cryptWithdrawalToCustomer, $noreplyFooter, $signature);

        $mailbody = implode("\n\n", $mailbodyArray);

        $suc = EmailTemplate::executeSendEmail($to, $subject, $mailbody, $from);

    }

    public function sendMailForTellingLoginInfoUnei($name, $email){

        $subject = "【good enough】アフィリエイトパートナー登録情報";
        $from = EmailTemplate::sendnotificationEmail;
        $to = EmailTemplate::partner;

        $cryptWithdrawalToCustomer = EmailTemplate::registerAsPartnerUnei($name, $email);
        $mailbodyArray = array($cryptWithdrawalToCustomer);
        $mailbody = implode("\n\n", $mailbodyArray);

        $suc = EmailTemplate::executeSendEmail($to, $subject, $mailbody, $from);

    }

    public function sendMailForTellingLoginInfo2($to, $name){

        $subject = "【good enough】スペシャルアフィリエイトパートナー申請";
        $from = EmailTemplate::sendnotificationEmail;

        $header = EmailTemplate::header($name);
        $cryptWithdrawalToCustomer = EmailTemplate::registerAsSpecialPartner();
        $noreplyFooter = EmailTemplate::noreplyFooter($name);
        $signature = EmailTemplate::signature($name);

        $mailbodyArray = array($header, $cryptWithdrawalToCustomer, $noreplyFooter, $signature);

        $mailbody = implode("\n\n", $mailbodyArray);

        $suc = EmailTemplate::executeSendEmail($to, $subject, $mailbody, $from);

    }

    // $$request->introducer: 紹介者のアフィリエイトコード
    public function registerLoginUserAsAffiliateUser(Request $request)
    {
        if(!Auth::check()){
            return redirect(route('mt4login'));
        }

        // ログインユーザの口座情報を取得
        $details = self::GetAccountInfo();
        $json = json_encode($details,JSON_PRETTY_PRINT);

        // 新規口座開設
        //$personalOrCompanyInfo = self::extractPersonalOrCompanyInfo($details);
        //$user = CreateAccount::GetTheUserWithEquity($details, $personalOrCompanyInfo->name, $personalOrCompanyInfo->company, $personalOrCompanyInfo->email);
        $user = Auth::user();

        // ログインユーザの口座番号を取得
        $login_user_info = explode("-",$user->name);
        $account_number = $login_user_info[1];

        // 上記を使って、Affiliatorsテーブルにレコード追加
        // $affiliator = self::createRecordForOnlyNormalAffiliatorTable($details, $json, $user, $account_number);

        $affiliateusers = Affiliateusers::Where("account_number", $account_number)->first();

        if($affiliateusers != null)
        {
            dd("本ログインユーザは、affiliateusersに既に登録されています");
        }

        $introduce_affiliateuser = Affiliateusers::Where("affilicode", $request->introducer)->first();
        if($introduce_affiliateuser == null)
        {
            dd("指定されたアフィリエイトコードを持つaffiliateuserはいません");
        }

        $affiligroupid = $introduce_affiliateuser->affiligroup;
        $tier = $introduce_affiliateuser->tier + 1;

         // 上記を使って、AffiliateUsersテーブルにレコード追加
        $affiliator = self::createAffiliateUser($details, $json, $user, $account_number, $affiligroupid, $tier, $request->introducer);

        dd("完了");
        /*
        // メール通知
        self::sendMailForTellingLoginInfo($affiliator->email, $affiliator->name);
        self::sendMailForTellingLoginInfoUnei($affiliator->name, $affiliator->email);

        // ビュー渡す
        $currentPath = asset('static')."/ja/accounts/addaccount";
        $thisRouteName = 'addaccount';
        $tempRefPath = asset('static')."/ja/forms/accounts";

        return view('affiliate.thanks')->with([
            "currentPath" => $currentPath,
            "thisRouteName" => $thisRouteName,
            "inqueryComplete" => $request->inqueryComplete,
            "tempRefPath" => $tempRefPath,
         ]);
         */
    }

    // details,json,Auth::user()->password, affilicode
    private function createAffiliateUser($details, $json, $user, $account_number, $affiligroupid, $tier, $introducer)
    {
        // 例外処理
        $details = self::insertIbNameBrank($details);
        
        // 紹介コードの生成
        $affilicode = self::random(10);
        
        // affiligroupidからcommission_percentを求める
        $affiligroup = Affiliategroup::Where("name", $affiligroupid)->first();
        $commission_percent = TreeDiagram::getCommissionPercent($tier, $affiligroup);

        // details,json,Auth::user()->password, affilicode,を使い、作成
        $affiliator = Affiliateusers::create([
            'account_number' => $account_number,
            'detail' => $json,
            'name' => $details["primary_holder"]["last_name"] . " " . $details["primary_holder"]["first_name"],
            'email' => $details["primary_holder"]["email"],
            'birthday' => $details["primary_holder"]["birth_year"] . "/" . $details["primary_holder"]["birth_month"] . "/" . $details["primary_holder"]["birth_day"],
            'tel' => $details["primary_holder"]["phone"],
            'password' => $user->password,
            'introducer' => $introducer,
            'affilicode' => $affilicode,
            'affiligroup' => $affiligroupid,
            'tier' => $tier,
            'commission_percent' => $commission_percent,
            'platform' => $details["basic_information"]["platform"],
        ]);

        return $affiliator;
    }
    
}
