<?php
namespace App\Library;

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


class CreateAccount
{
    // $nameは以下の２パターン
    // $name = $all["primary_holder"]["last_name"] . " " . $all["primary_holder"]["first_name"];
    // $name = $all["company"]["name"] . " " . $all["company"]["type_business"];

    // $companyは以下の２パターン
    // null
    // $all["company"]["name"]

    // $emailは以下の2パターン
    // $email = $all["primary_holder"]["email"];
    // $email = $all["company"]["email"];
    
    // 身分証の保持はここでは行わないので注意

    // ここでやることは、
    // 1. mt4　経由で口座開設
    // 2. Accountテーブルにレコード追加
    // 3. ユーザーテーブルの作成
    static public function GetTheUserWithEquity($all, $name, $company, $email){

        // mt4　経由で口座開設
        $this_real_user_in_json = MT4API::createRealUser($all, $name);
        $this_real_user = json_decode($this_real_user_in_json, true);

        // 上記で開設した口座の口座番号を取得
        $account_num = $this_real_user[0]["login"];

        // Accountテーブルにレコード追加
        $json = json_encode($all,JSON_PRETTY_PRINT);
        $new_user = Account::create([
            'account_number' => $account_num,
            'detail' => $json,
            'name' => $name,
            'email' => $all["primary_holder"]["email"],
            'birthday' => $all["primary_holder"]["birth_year"] . "/" . $all["primary_holder"]["birth_month"] . "/" . $all["primary_holder"]["birth_day"],
            'tel' => $all["primary_holder"]["phone"],
            'company' => $company,
        ]);

        // ランダムにパスワードを生成
        $password = self::random();

        // ２段階認証の秘密鍵生成
        $google2fa_login_url = asset('GoogleAuthenticator')."/register.php";
        $google2fa_secret = HttpRequest::GetRequest($google2fa_login_url);

        
        // ユーザーテーブルの作成
        $user = User::create([
            'name' => "mt4-".$account_num,
            'email' => $email,
            'password' => Hash::make($password),
            'google2fa_secret' => $google2fa_secret,
            'valid' => false,
        ]);

        return $user;
         
    }

    static public function random($length = 8)
    {
        return substr(str_shuffle('1234567890'), 0, 1) .  substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, $length-1);
    }
}