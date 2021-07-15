<?php
namespace App\Library;
use App\Affiliateusers;
use Illuminate\Support\Facades\Auth;
use App\Account;
use App\Mt4GroupUserInfo;

class PersonalPageVariable
{
    

    static public function get_personalpage_variable()
    {
        $details = self::GetAccountInfo();

        return (object) [
            'left_profile_table_body' => self::left_profile_table_body($details),
        ];
    }

    static private function left_profile_table_body($details)
    {
        $table_body = [];

       

        $table_body2 = [];
        $table_body2[] = trans('mypage.mypage_name');
        $table_body2[] = $details["primary_holder"]["first_name"]." ".$details["primary_holder"]["last_name"];
        $table_body[] = $table_body2;

        $table_body2 = [];
        $table_body2[] = trans('mypage.mypage_number');
        $table_body2[] = $details["account_number"];
        $table_body[] = $table_body2;

        $table_body2 = [];
        $table_body2[] = trans('mypage.mypage_type');
        $table_body2[] = $details["basic_information"]["currency"];
        $table_body[] = $table_body2;

        $table_body2 = [];
        $table_body2[] = trans('mypage.mypage_leverage');
        $table_body2[] = $details["leverage"];
        $table_body[] = $table_body2;

        $table_body2 = [];
        $table_body2[] = trans('mypage.mypage_main');
        $table_body2[] = $details["primary_holder"]["email"];
        $table_body[] = $table_body2;

        $table_body2 = [];
        $table_body2[] = trans('mypage.mypage_open');
        $table_body2[] = $details["created_at"];
        $table_body[] = $table_body2;
        

        return $table_body;
    }

    static public function GetAccountInfo()
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
}