<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\EmailTemplate;
use App\Library\GlobalVariable;

class InquiryController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function confirm(Request $request)
    {
        $name = $request->name;
        $to = $request->email;
        $content = $request->message;

        self::sendMailForTellingLoginInfo($to, $name, $content);

        $notification_receive_mail = "support@goodenoughtreasure.com";
        self::sendMailForTellingLoginInfoForNotification($notification_receive_mail, $name, $content);

        // 共通部分表示に使用する情報
        $global = GlobalVariable::get_global_variable();
        $thanks_messsage1 = 'お問い合わせを承りました。サポートより３営業日以内に返信致します。';
        $thanks_messsage2 = '今しばらくお待ちいただきますようお願いいたします。';

        return view('thanks')->with([
          "global" => $global,
          "thanks_messsage1" => $thanks_messsage1,
          "thanks_messsage2" => $thanks_messsage2,
        ]);
    }

    public function index(Request $request)
    {
        // 共通部分表示に使用する情報
        $global = GlobalVariable::get_global_variable();

        return view('inquiry.register')->with([
            "global" => $global,
        ]);
    }

    public function sendMailForTellingLoginInfoForNotification($to, $name, $content){

        $subject = "GOOD ENOUGH・問い合わせの通知";
        $from = EmailTemplate::sendnotificationEmail;

        $header = EmailTemplate::header($name);
        $cryptWithdrawalToCustomer = EmailTemplate::registerinquiryToUnei($name, $to, $content);
        $noreplyFooter = EmailTemplate::noreplyFooter($name);
        $signature = EmailTemplate::signature($name);

        $mailbodyArray = array($cryptWithdrawalToCustomer);

        $mailbody = implode("\n\n", $mailbodyArray);

        $suc = EmailTemplate::executeSendEmail($to, $subject, $mailbody, $from);
    }

    public function sendMailForTellingLoginInfo($to, $name, $content){

        $subject = "GOOD ENOUGH・お問い合わせフォーム送信しました";
        $from = EmailTemplate::sendnotificationEmail;

        $header = EmailTemplate::header($name);
        $cryptWithdrawalToCustomer = EmailTemplate::registerinquiryToCustomer($name, $to, $content);
        $noreplyFooter = EmailTemplate::noreplyFooter($name);
        $signature = EmailTemplate::signature($name);

        $mailbodyArray = array($cryptWithdrawalToCustomer);

        $mailbody = implode("\n\n", $mailbodyArray);

        $suc = EmailTemplate::executeSendEmail($to, $subject, $mailbody, $from);
    }
}
