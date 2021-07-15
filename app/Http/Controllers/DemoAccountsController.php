<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\EmailTemplate;
use App\Library\GlobalVariable;

class DemoAccountsController extends Controller
{
    public function index(Request $request)
    {
        // 共通部分表示に使用する情報
        $global = GlobalVariable::get_global_variable();

        return view('demo.register')->with([
            "global" => $global,
        ]);
        
    }

    public function confirm(Request $request)
    {
        $name = $request->first_name." ".$request->last_name;
        $to = $request->email;
        $leverage = $request->leverage;

        self::sendMailForTellingLoginInfo($to, $name, $leverage);
        self::sendMailForTellingLoginInfo2($to, $name, $leverage);

        $global = GlobalVariable::get_global_variable();
        $thanks_messsage1 = 'デモ口座申請いただき、誠にありがとうございます。';
        $thanks_messsage2 = '２営業日以内にメールにてご連絡致します';
        $thanks_messsage3 = '';

        return view('thanks')->with([
          "global" => $global,
          "thanks_messsage1" => $thanks_messsage1,
          "thanks_messsage2" => $thanks_messsage2,
          "thanks_messsage3" => $thanks_messsage3,
         ]);
    }

    public function sendMailForTellingLoginInfo2($email, $name, $leverage){
        $subject = "GOOD ENOUGH・デモ口座登録通知";
        $from = EmailTemplate::sendnotificationEmail;

        $header = EmailTemplate::header($name);
        $cryptWithdrawalToCustomer = EmailTemplate::registerDemoAccountToCustomer($name, $email, $leverage);
        $noreplyFooter = EmailTemplate::noreplyFooter($name);
        $signature = EmailTemplate::signature($name);

        $mailbodyArray = array($cryptWithdrawalToCustomer);

        $mailbody = implode("\n\n", $mailbodyArray);

        $to = EmailTemplate::demo;
        $suc = EmailTemplate::executeSendEmail($to, $subject, $mailbody, $from);
    }

    public function sendMailForTellingLoginInfo($to, $name, $leverage){


        $subject = "GOOD ENOUGH・デモ口座登録のお知らせ";
        $from = EmailTemplate::sendnotificationEmail;

        $cryptWithdrawalToCustomer = EmailTemplate::registerDemoAccountToCustomer2($name);

        $mailbodyArray = array($cryptWithdrawalToCustomer);

        $mailbody = implode("\n\n", $mailbodyArray);

        $suc = EmailTemplate::executeSendEmail($to, $subject, $mailbody, $from);
    }
}
