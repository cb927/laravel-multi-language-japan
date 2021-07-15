<?php
namespace App\Library;
use App\Affiliateusers;

class MT4API
{
    static public function GetInvalidAccountGroup(){
        return 'TASDDUSD-000';
    }

    // 一般アフィリエイタ(代理店でない)が属する、アフィリグループ
    static public function GetNormalAffiliatorAffiliGroup(){
        return 0;
    }

    static public function closedOrders($login){

        if (env('APP_ENV') === 'production') {
        $result = self::httpGetRequest('closedOrders?login='.$login);
        }else
        {
            $result = Affiliateusers::Where("account_number", $login)->first()->closed_orders;
        }

        return $result;
    }

    static public function usersWithEquity(){

        if (env('APP_ENV') === 'production') {
        $result = self::httpGetRequest('usersWithEquity');
        }else{
            $result = '[{"login":2136798054,"group":"TASDDBTC-000","balance":"20010.00","credit":"0.00","equity":"20010.00","margin":"0.00","freeMargin":"20010.00"}]';
        }

        return $result;
    }

    static public function GetTheUserWithEquity($login){

        // $usersWithEquity取得
        $usersWithEquityInJson = self::usersWithEquity();
        $usersWithEquity = json_decode($usersWithEquityInJson, true);
        
        // 特定のlogin number ユーザに関する情報だけ$thisUserWithEquityとして取得
        $thisUserWithEquity = null;
        foreach($usersWithEquity as $userWithEquity)
        {
            if($userWithEquity['login'] == $login)
            {
                $thisUserWithEquity = $userWithEquity;
            }
        }

        return $thisUserWithEquity;
    }

    static public function changePassword($login, $password){
        //[IP:port]/mt4webapi/changePassword?login=1000&newPassword=password1&newInvestorPassword=password2

        if (env('APP_ENV') === 'production') {
        $result = self::httpGetRequest('changePassword?login='.$login.'&newPassword='.$password);         
        }else{
            $result ='[{"issuccess":"true"}]';
            // change user
        }

        return $result;
    }

    static public function createRealUser($all, $name){
        
        $RealUserInfo = array();

        $password = self::random();

        $RealUserInfo['name'] = $name; // 入力情報
        $RealUserInfo['password'] = $password; // 自動生成
        $RealUserInfo['group'] = self::GetInvalidAccountGroup(); // テスト用として指定されたグループ
        $RealUserInfo['leverage'] = 'test'; // 保留
        $RealUserInfo['login'] = 'test'; // なんでも良いのでこのままでok
        $RealUserInfo['email'] = $all["primary_holder"]["email"]; // 入力情報
        $RealUserInfo['lead'] = 'test'; // 保留
        $RealUserInfo['phone'] = $all["primary_holder"]["phone"]; // 入力情報
        $RealUserInfo['investorPassword'] = $password; // 自動生成
        $RealUserInfo['comment'] = 'test'; // なんでも良いのでこのままでok
        
        $getParameters = array_map(function ($key, $value) { return $key . '=' . $value; },
                    array_keys($RealUserInfo), array_values($RealUserInfo));

        if (env('APP_ENV') === 'production') {
        $result = self::httpGetRequest('createRealUser'."?".implode("&", $getParameters));             
        }else{
            $userid = self::randomuserid(10);
            $result = '[{"issuccess": "true", "login": "'.$userid.'"}]';
            // create user
        }
        

        return $result;
    }

    static protected function randomuserid($length = 8)
    {
        return substr(str_shuffle('1234567890'), 0, $length);
    }

    static protected function random($length = 8)
    {
        return substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, $length);
    }

    static public function httpGetRequest($method)
    {
        $options = array(
            'http'=>array(
        'ignore_errors' => true,
                'method'=>'GET',
                'header'=>"User-Agent: Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)\r\n".
                          "Accept-language: ja\r\n"
            )
        );
        
        $options['ssl']['verify_peer']=false;
        $options['ssl']['verify_peer_name']=false;
        
        $context = stream_context_create( $options );
        $result = file_get_contents( 'https://177303:u4JNeNY@54.168.43.216:8081/mt4webapi/'.$method, FALSE, $context );
        
        $result = mb_convert_encoding($result, "UTF-8", "SJIS");

        return $result;
    }
}