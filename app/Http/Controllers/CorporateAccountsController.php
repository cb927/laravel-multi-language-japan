<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Account;
use Illuminate\Support\Facades\Hash;
use \GuzzleHttp\Client;
use App\Library\EmailTemplate;
use App\Library\MT4API;
use App\SpecialAffiliators;
use App\Affiliateusers;
use Illuminate\Support\Facades\Auth;
use App\Affiliategroup;
use App\Library\TreeDiagram;
use App\Library\HttpRequest;
use App\Library\GlobalVariable;


class CorporateAccountsController extends Controller
{
    public function index(Request $request)
    {
        // 共通部分表示に使用する情報
        $global = GlobalVariable::get_global_variable();

        return view('corporate.register')->with([
            "global" => $global,
         ]);
        
    }

    public function testcode(Request $request)
    {
        $currentPath = asset('static')."/ja/forms/accounts";
        $validation = true;
        $thisRouteName = 'individual';
        $ref_name = $request->ref;

        return view('registerlayout.testcode2')->with([
            "currentPath" => $currentPath,
            "validation" => $validation,
            "thisRouteName" => $thisRouteName,
            "inqueryComplete" => $request->inqueryComplete,
            "ref_name" =>  $ref_name,
         ]);
        
    }

    private function saveFile($request, $account_num){
        self::saveThisFile($request, $account_num, 'form_power_of_attorney');
        self::saveThisFile($request, $account_num, 'doc_id_passport');
        self::saveThisFile($request, $account_num, 'doc_id_driver_license');
        self::saveThisFile($request, $account_num, 'doc_id_back_driver_license');
        self::saveThisFile($request, $account_num, 'doc_id_identity_card');
        self::saveThisFile($request, $account_num, 'doc_id_back_identity_card');
        self::saveThisFile($request, $account_num, 'doc_id_residence_permit');
        self::saveThisFile($request, $account_num, 'doc_proof_of_address');
        self::saveThisFile($request, $account_num, 'form_w8ben');
        self::saveThisFile($request, $account_num, 'form_corporate_signature');
        self::saveThisFile($request, $account_num, 'form_equities_client_agreement');
        self::saveThisFile($request, $account_num, 'form_sterling_non_pro_questionaire');
    }

    private function saveThisFile($request, $account_num, $account_name){
        if($request->file($account_name) != null)
        {
            $request->file($account_name)->store($account_num."_".$account_name);
        }
    }

    public function confirm(Request $request)
    {
        // getパラメータ取得
        $all = $request->all();

        $name = $all["company"]["name"] . " " . $all["company"]["type_business"];

        $this_real_user_in_json = MT4API::createRealUser($all, $name);
        $this_real_user = json_decode($this_real_user_in_json, true);

        // 実際には運営側が口座番号を決定してログイン情報として使うが、
        // 現状は口座情報テーブルの primary key の id を 0埋めで6桁にしたものをログイン時に用いる口座番号とする
        $account_num = $this_real_user[0]["login"];

        // 口座情報を登録 (現状は、口座番号は'account_number_test'というダミーの値)
        // name以降は、運用側で確認しやすいように、'detail' => $json、の値を抽出して表示しているだけ
        $json = json_encode($all,JSON_PRETTY_PRINT);
        $new_user = Account::create([
            'account_number' => $account_num,
            'detail' => $json,
            'name' => $name,
            'email' => $all["primary_holder"]["email"],
            'birthday' => $all["primary_holder"]["birth_year"] . "/" . $all["primary_holder"]["birth_month"] . "/" . $all["primary_holder"]["birth_day"],
            'tel' => $all["primary_holder"]["phone"],
            'company' => $all["company"]["name"],
        ]);

        self::saveFile($request, $account_num);

        // 実際には運営側が決定するが、現状はパスワード固定
        $password = self::random();

        $email = $all["company"]["email"];

        // ２段階認証の秘密鍵生成
        $google2fa_login_url = asset('GoogleAuthenticator')."/register.php";
        $google2fa_secret = HttpRequest::GetRequest($google2fa_login_url);
        
        try {
            User::create([
                'name' => "mt4-".$account_num,
                'email' => $email,
                'password' => Hash::make($password),
                'google2fa_secret' => $google2fa_secret,
                'valid' => false,
            ]);
        } catch (\Exception $e) {
            $currentPath = asset('static')."/ja/forms/accounts/individual-confirm";
            return view('register_error')->with([
                "currentPath" => $currentPath,
            ]);
        }

        $last_name = $all["primary_holder"]["last_name"];
        $first_name = $all["primary_holder"]["first_name"];
        $tel = $all["primary_holder"]["phone"];

        $name = $last_name.$first_name;

        $companyname = $all["company"]["name"];

        $leverage = $all["basic_information"]["leverage"];

        self::CreateAffiliateUsersIfApplyWasSent($all, $json, Hash::make($password), $email, $account_num, $new_user);

        self::CreateAffiliateUsersIfRegisterAllificode($all, $json, Hash::make($password), $email, $account_num);


        self::sendMailForTellingLoginInfo($email, $account_num, $password, $name);
        self::sendMailForTellingRegistrationInfo($email, $account_num, $password, $name, $tel, $companyname, $leverage);

        $currentPath = asset('static')."/ja/forms/accounts/individual-confirm";
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

    // 紹介コードありで、一般登録の場合、アフィリエイターテーブルに登録(メールは送らない)
    private function CreateAffiliateUsersIfRegisterAllificode($details, $json, $password, $email, $account_num)
    {
        $introducer = $details["extra_information"]["ib_name"];
         if($introducer == null || $introducer == ""){
             return;
         }

        $aa = SpecialAffiliators::Where("email", $email)->first();
        if($aa != null)
        {
            return;
        }

        $affilicode = self::random(10);

        if($introducer == null)
        {
            $introducer = '';
            $details["extra_information"]["ib_name"] = '';
        }
        
        $parent_user = Affiliateusers::Where("affilicode", $introducer)->first();
        $affiligroupid = $parent_user->affiligroup;
        $affiligroup = Affiliategroup::Where("name", $affiligroupid)->first();
        $tier = $parent_user->tier + 1;
        $commission_percent = TreeDiagram::getCommissionPercent($tier, $affiligroup);

        

        $affiliator = Affiliateusers::create([
            'account_number' => $account_num,
            'detail' => $json,
            'name' => $details["primary_holder"]["last_name"] . " " . $details["primary_holder"]["first_name"],
            'email' => $details["primary_holder"]["email"],
            'birthday' => $details["primary_holder"]["birth_year"] . "/" . $details["primary_holder"]["birth_month"] . "/" . $details["primary_holder"]["birth_day"],
            'tel' => $details["primary_holder"]["phone"],
            'password' => $password,
            'introducer' => $introducer,
            'affilicode' => $affilicode,
            'affiligroup' => $affiligroupid,
            'tier' => $tier,
            'commission_percent' => $commission_percent,
            'platform' => $details["basic_information"]["platform"],
        ]);
    }

    private function CreateAffiliateUsersIfApplyWasSent($details, $json, $password, $email, $account_num, $new_user)
    {
        $introducer = $details["extra_information"]["ib_name"];

        $aa = SpecialAffiliators::Where("email", $email)->first();
        if($aa == null)
        {
            return;
        }


        $affilicode = self::random(10);

        if($introducer == null)
        {
            $introducer = '';
            $details["extra_information"]["ib_name"] = '';
        }
        
        $affiligroupid = $new_user->account_number;
        
        $tier = 1;
        $commission_percent = 0.9;//トップの代理店におけるcommission_percentのデフォルト値
        if($introducer != null && $introducer != ""){
            $parent_user = Affiliateusers::Where("affilicode", $introducer)->first();
            $affiligroupid = $parent_user->affiligroup;
            $affiligroup = Affiliategroup::Where("name", $affiligroupid)->first();
            $tier = $parent_user->tier + 1;
            $commission_percent = TreeDiagram::getCommissionPercent($tier, $affiligroup);
        }

        $affiliator = Affiliateusers::create([
            'account_number' => $account_num,
            'detail' => $json,
            'name' => $details["primary_holder"]["last_name"] . " " . $details["primary_holder"]["first_name"],
            'email' => $details["primary_holder"]["email"],
            'birthday' => $details["primary_holder"]["birth_year"] . "/" . $details["primary_holder"]["birth_month"] . "/" . $details["primary_holder"]["birth_day"],
            'tel' => $details["primary_holder"]["phone"],
            'password' => $password,
            'introducer' => $introducer,
            'affilicode' => $affilicode,
            'affiligroup' => $affiligroupid,
            'tier' => $tier,
            'commission_percent' => $commission_percent,
            'platform' => $details["basic_information"]["platform"],
        ]);
    }

    protected function random($length = 8)
    {
        return substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, $length);
    }

    public function sendMailForTellingLoginInfo($to, $account_num, $password, $name){
        $subject = "GOOD ENOUGH・法人口座開設申請を受け付けました";
        $from = EmailTemplate::sendnotificationEmail;

        $header = EmailTemplate::header($name);
        $cryptWithdrawalToCustomer = EmailTemplate::registerIndividualAccountToCustomer();
        $noreplyFooter = EmailTemplate::noreplyFooter($name);
        $signature = EmailTemplate::signature($name);

        $mailbodyArray = array($header, $cryptWithdrawalToCustomer, $noreplyFooter, $signature);

        $mailbody = implode("\n\n", $mailbodyArray);

        $suc = EmailTemplate::executeSendEmail($to, $subject, $mailbody, $from);
    }


    public function sendMailForTellingRegistrationInfo($email, $account_num, $password, $name,$tel, $companyname, $leverage){
        $subject = "GOOD ENOUGH・法人口座登録";
        $from = EmailTemplate::sendnotificationEmail;
        $to = EmailTemplate::corporateAccountRegistration;

        $cryptWithdrawalToCustomer = EmailTemplate::registerIndividualAccountToOperator($name,$email,$tel, $companyname, $leverage);
        $mailbodyArray = array($cryptWithdrawalToCustomer);
        $mailbody = implode("\n\n", $mailbodyArray);

        $suc = EmailTemplate::executeSendEmail($to, $subject, $mailbody, $from);
    }

}
