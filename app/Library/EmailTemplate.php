<?php
namespace App\Library;

use App\Email;

class EmailTemplate
{
    const sendnotificationEmail = "send@goodenoughtreasure.com";

    const withdrawalDepositEmail = "withdraw@goodenoughtreasure.com";

    const personalAccountRegistration = "personal@goodenoughtreasure.com";

    const corporateAccountRegistration = "corporate@goodenoughtreasure.com";

    const partner = "partner@good-enough.com";

    const specialPartner = "special_partner@good-enough.com";

    const withdrawalDeposit = "withdraw@goodenoughtreasure.com";

    const testAddress = "aassdfghjkl001@gmail.com";

    const mamNotification = "mam-partner@good-enough.com";

    const demo = "demo@goodenoughtreasure.com";

    static public function header($name) {

// begin: テンプレート
$mailbody = '%name%様

日頃よりGOOD ENOUGH をご利用いただき誠にありがとうございます。
GOOD ENOUGHサポートです。';
// end: テンプレート

    $mailbody = str_replace ("%name%", $name, $mailbody);

    return $mailbody;

    }

    static public function noreplyFooter(){
$mailbody = '今後とも GOOD ENOUGH をよろしくお願いいたします。

※本メールにお心当たりのない場合や、ご意見・ご質問等がございましたら下部のお問い合わせ先よりお知らせください。
※本メールは送信専用です。返信することはできません。ご注意ください。';

        return $mailbody;
    }

    static public function replyFooter(){
        $mailbody = '今後とも GOOD ENOUGH をよろしくお願いいたします。';

        return $mailbody;
    }

    static public function signature(){
$mailbody = '~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
GOOD ENOUGH
サポートセンター
■GOOD ENOUGH オフィシャルサイト
https://goodenoughtreasure.com
■よくあるご質問
 %faqurl%
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
copyright (c) GOOD ENOUGH. All rights reserved.';

        $mailbody = str_replace ("%faqurl%", route('faq'), $mailbody);
        $mailbody = str_replace ("%topurl%", route('top'), $mailbody);

        return $mailbody;
    }

    // ログイン情報通知メール
    static public function notificateLoginInfo($name, $login, $password, $kind){
        // begin: テンプレート
        $mailbody = '%name%様
%kind%口座の開設が完了いたしました。

以下の情報をご確認いただきもしご不明な点がございましたらお知らせください。
        
ログインID   %login%
パスワード　%password%

口座へのアクセス:
会員ページへのログインは弊社ウェブサイトhttps://good-enough.com/ 右上の「会員ログイン」から行ってください。

※上記パスワードは、グッドイナフへのログインの際、必要になりますので、必ず本メールは保存してご利用下さいませ。
※スマホやPC等のアプリでMT4パスワードを任意に変更して頂く事は可能ですが、グッドイナフのログインパスワードは上記となります。
※パスワード変更をご希望の場合、サポートへお問合せください。

お問合せ先：support@good-enough.com
        
MT4のダウンロードは下記のリンクから可能です

【ダウンロード】
MT4 Client Terminal:
https://download.mql5.com/cdn/web/17346/mt4/goodenoughsetup.exe

MT4 Mobile:
https://download.mql5.com/cdn/mobile/mt4/ios
https://download.mql5.com/cdn/mobile/mt4/android
';
        // end: テンプレート
        
        $mailbody = str_replace ("%name%", $name, $mailbody);
        $mailbody = str_replace ("%login%", $login, $mailbody);
        $mailbody = str_replace ("%password%", $password, $mailbody);
        $mailbody = str_replace ("%kind%", $kind, $mailbody);
    
        return $mailbody;
    }

    // アフィリエイト専用口座の有効化時のログイン情報通知メール
    static public function notificateAffiliateUserLoginInfo($name, $login, $password, $kind, $special, $code){
        // begin: テンプレート
        $mailbody = '%name%様
%special%アフィリエイトパートナーの登録が完了いたしました。
以下の情報をご確認いただきもしご不明な点がございましたらお知らせください。

アフィリエイト管理サイトリンク
https://partner.good-enough.com
ログインID   %login%
パスワード　%password%

アフィリエイト用口座開設リンク

個人口座紹介者リンク
https://good-enough.com/individual?ref=%code%

法人口座紹介者リンク
https://good-enough.com/corporate?ref=%code%
';
        // end: テンプレート
        
        $mailbody = str_replace ("%name%", $name, $mailbody);
        $mailbody = str_replace ("%login%", $login, $mailbody);
        $mailbody = str_replace ("%password%", $password, $mailbody);
        $mailbody = str_replace ("%kind%", $kind, $mailbody);
        $mailbody = str_replace ("%special%", $special, $mailbody);
        $mailbody = str_replace ("%code%", $code, $mailbody);
    
        return $mailbody;
    }

    // No33 個人口座開設 ＆ MAM同意書, No.34 法人口座開設 ＆ MAM同意書
    static public function mamEmailNotificateLoginInfo($name, $login, $password, $kind){
        // begin: テンプレート
        $mailbody = '%name%様
'.$kind.'口座の開設が完了いたしました。
以下の情報をご確認いただきもしご不明な点がございましたらお知らせください。

MT4にログイン後、ツール＞オプションからパスワードの変更が可能です。

ログインID   %login%
パスワード　%password%

口座へのアクセス:
会員ページへのログインは弊社ウェブサイトhttps://good-enough.com/ 右上の「会員ログイン」から行ってください。

MT4のダウンロードは下記のリンクから可能です

【ダウンロード】
MT4 Client Terminal:
https://download.mql5.com/cdn/web/17346/mt4/goodenoughsetup.exe

MT4 Mobile:
https://download.mql5.com/cdn/mobile/mt4/ios
https://download.mql5.com/cdn/mobile/mt4/android
 

【MAM同意書提出のお願い】
貴社よりお申し込みのありましたMAM口座に関しましてご案内申し上げます。

添付されましたMAM口座承認に関します書類に貴社の

・good enoughでの口座番号
・使用されているメールアドレス
・お名前（ローマ字で）

を記載いただきまして、PDFファイルにて下記メールアドレスまでご返信くださいますよう
お願い申し上げます。

書類受領後に確認させていただきMAM口座連結へと進めさせていただきます。
ご面倒おかけいたしますが何卒ご理解のほどよろしくお願い申し上げます。

添付書類に記載されておりますMAMトレーダー名も間違いが無いかご注意のほど
よろしくお願いいたします。
※一旦連結したMAM口座は別のトレーダーに連結変更することは出来ません。

よろしくお願い申し上げます。';
        // end: テンプレート
        
        $mailbody = str_replace ("%name%", $name, $mailbody);
        $mailbody = str_replace ("%login%", $login, $mailbody);
        $mailbody = str_replace ("%password%", $password, $mailbody);
    
        return $mailbody;
    }

    // No.7 暗号資産出金申請
    static public function cryptWithdrawalToCustomer($how, $howmuch, $address){
// begin: テンプレート
$mailbody = '出金方法：%how%
出金額：%howmuch%
受取アドレス：%address%

出金のお手続きが完了するまで今しばらくお待ちいただけますようお願い致します。
通常3営業日以内（申請日を除く）に処理を致しますが、処理状況により遅れる可能性がありますことをご理解のほどお願い致します。';
// end: テンプレート
    
    $mailbody = str_replace ("%how%", $how, $mailbody);
    $mailbody = str_replace ("%howmuch%", $howmuch, $mailbody);
    $mailbody = str_replace ("%address%", $address, $mailbody);

    return $mailbody;
    }

    // No.8 暗号資産出金申請
    static public function cryptWithdrawalToOperator($account, $howmuch, $howdo, $address, $name){
// begin: テンプレート
$mailbody = '口座番号：%accountnum%
お名前：%name%
Eメールアドレス：%email%
電話番号：%tel%
出金額：%howmuch%
出金方法：%howdo%
受取りアドレス：%address%';
// end: テンプレート
    
    $mailbody = str_replace ("%accountnum%", $account->account_number, $mailbody);
    $mailbody = str_replace ("%name%", $account->name, $mailbody);
    $mailbody = str_replace ("%email%", $account->email, $mailbody);
    $mailbody = str_replace ("%tel%", $account->tel, $mailbody);
    $mailbody = str_replace ("%howmuch%", $howmuch, $mailbody);
    $mailbody = str_replace ("%howdo%", $howdo, $mailbody);
    $mailbody = str_replace ("%address%", $address, $mailbody);

    return $mailbody;
    }

    // No.10 銀行出金申請
    static public function bankWithdrawalToCustomer($howmuch){
// begin: テンプレート
$mailbody = '出金額(USD)：%howmuch%

お客様よりご連絡のありました、出金申請を受け付けました。
出金のお手続きが完了するまで今しばらくお待ちいただけますようお願い致します。
通常3営業日以内（申請日を除く）に処理を致しますが、処理状況により遅れる可能性がありますことをご理解のほどお願い致します。';
// end: テンプレート
    
    $mailbody = str_replace ("%howmuch%", $howmuch, $mailbody);

    return $mailbody;
    }

    // No.11 銀行出金申請
    static public function bankWithdrawalToOperator($accountnum, $email, $howmuch, $bank, $name){
// begin: テンプレート
$mailbody = '出金元口座番号：%accountnum%
出金申請金額：%howmuch%

*銀行口座名義人氏名：%receiver_name%
銀行口座名義人住所：%receiver_address%
*受取人口座番号：%receiver_accountnum%
*銀行名：%receiver_bankname%
*支店名：%receiver_bankbranch%
*普通/当座：%receiver_bankkind%';
        // end: テンプレート

            $mailbody = str_replace ("%accountnum%", $accountnum, $mailbody);
            $mailbody = str_replace ("%howmuch%", $howmuch, $mailbody);

            $mailbody = str_replace ("%receiver_name%", $bank->bank_name, $mailbody);
            $mailbody = str_replace ("%receiver_address%", $bank->bank_account_address, $mailbody);
            $mailbody = str_replace ("%receiver_accountnum%", $bank->bank_account_number, $mailbody);
            $mailbody = str_replace ("%receiver_bankname%", $bank->bank_account_number, $mailbody);
            $mailbody = str_replace ("%receiver_bankbranch%", $bank->bank_branch, $mailbody);
            $mailbody = str_replace ("%receiver_bankkind%", $bank->bank_kind, $mailbody);

            return $mailbody;
            }

    static public function registerIndividualAccountToCustomer(){

        $mailbody = 'この度はGOOD ENOUGHにご登録いただき、誠にありがとうございます。
3営業日ほど審査にお時間をいただくことをご了承ください。';

        return $mailbody;
    }

    static public function registerDemoAccountToCustomer($name, $email, $leverage){

        $mailbody = 'お名前：%name%
Eメールアドレス：%email%
レバレッジ：%leverage%
';

        // 本文の文字列置き換え
        $mailbody = str_replace ("%name%", $name, $mailbody);
        $mailbody = str_replace ("%email%", $email, $mailbody);
        $mailbody = str_replace ("%leverage%", $leverage, $mailbody);
        return $mailbody;
    }

    static public function registerDemoAccountToCustomer2($name){



// テンプレートからメール本文の読み込み
$mailbody = '%name%様

日頃よりGOOD ENOUGH をご利用いただき誠にありがとうございます。
GOOD ENOUGHサポートです。

GOOD ENOUGH・MT4デモ口座登録

デモ口座申請いただき誠にありがとうございます。

メタトレーダー４はFX取引において、世界で最も人気の高い取引システムです。GOOD ENOUGHでは数多くの通貨ペア、CFDや株式指標等のお取り引きに対応致します。

(iphone/ipadの方）
https://apps.apple.com/jp/app/metatrader-4/id496212596?utm_campaign=download&utm_source=www.metatrader4.com

※アプリをダウンロードして頂きダウンロード完了後にデモ口座を作成してください。
※取引サーバーはGOOD ENOUGH-Demoになります。

(Androidの方）
https://play.google.com/store/apps/details?id=net.metaquotes.metatrader4&hl=ja&referrer=ref_id%3d5191253187623362721%26utm_source%3dwww.metatrader4.com%26utm_campaign%3ddownload
※アプリをダウンロードして頂きダウンロード完了後にデモ口座を作成してください。
※取引サーバーはGOOD ENOUGH-Demoになります。

(PCの方）
https://download.mql5.com/cdn/web/17346/mt4/goodenoughsetup.exe

※GOOD ENOUGH用のMT4です。※ソフトをダウンロードして頂きダウンロード完了後にデモ口座を作成してください。
※取引サーバーはGOOD ENOUGH-Demoになります。※MacOSでは作動しませんのでご注意ください。

今後とも GOOD ENOUGH をよろしくお願いいたします。

※本メールは送信専用です。返信することはできません。
※本メールに心当たりの無い場合や、ご意見ご質問等は下記へご連絡下さい。

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
GOOD ENOUGH
サポートセンター
■GOOD ENOUGH オフィシャルサイト
https://goodenoughtreasure.com
■よくあるご質問
 %faqurl%
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
copyright (c) GOOD ENOUGH. All rights reserved.';

        // 本文の文字列置き換え
        $mailbody = str_replace ("%name%", $name, $mailbody);
        $mailbody = str_replace ("%faqurl%", route('faq'), $mailbody);
        $mailbody = str_replace ("%topurl%", route('top'), $mailbody);
        
        return $mailbody;
    }

    static public function registerinquiryToUnei($name, $to, $content){

        $mailbody = 'お名前：%name%
Eメールアドレス：%email%

お問い合わせ内容：
%content%
';

        $mailbody = str_replace ("%name%", $name, $mailbody);
        $mailbody = str_replace ("%email%", $to, $mailbody);
        $mailbody = str_replace ("%content%", $content, $mailbody);
        
        return $mailbody;
    }

    static public function registerinquiryToCustomer($name, $to, $content){

        
// テンプレートからメール本文の読み込み
$mailbody = '%name%様

日頃よりGOOD ENOUGH をご利用いただき誠にありがとうございます。
GOOD ENOUGHサポートです。

Eメールアドレス：%email%

お問い合わせ内容：
%content%

サポートセンターより３営業日以内に返信致します。
返信までしばらくお待ちいただきますようお願い致します。

今後とも GOOD ENOUGH をよろしくお願いいたします。

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
GOOD ENOUGH
サポートセンター
■GOOD ENOUGH オフィシャルサイト
https://goodenoughtreasure.com
■よくあるご質問
 %faqurl%
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
copyright (c) GOOD ENOUGH. All rights reserved.
';

        // 本文の文字列置き換え
        $mailbody = str_replace ("%name%", $name, $mailbody);
        $mailbody = str_replace ("%email%", $to, $mailbody);
        $mailbody = str_replace ("%content%", $content, $mailbody);
        $mailbody = str_replace ("%faqurl%", route('faq'), $mailbody);
        $mailbody = str_replace ("%topurl%", route('top'), $mailbody);
        
        return $mailbody;
    }

    static public function registerIndividualAccountToOperator($name,$email,$tel, $companyname, $leverage){

        $mailbody2 = "";
        if($companyname != null)
        {
          $mailbody2 = '法人名：%companyname%
Eメールアドレス：%email%
電話番号：%tel%
レバレッジ：%leverage%
';

          $mailbody2 = str_replace ("%companyname%", $companyname, $mailbody2);
          $mailbody2 = str_replace ("%email%", $email, $mailbody2);
          $mailbody2 = str_replace ("%tel%", $tel, $mailbody2);
          $mailbody2 = str_replace ("%leverage%", $leverage, $mailbody2);

          return $mailbody2;
        }




        $mailbody = 'お名前：%name%
Eメールアドレス：%email%
電話番号：%tel%
レバレッジ：%leverage%
';

        $mailbody = str_replace ("%name%", $name, $mailbody);
        $mailbody = str_replace ("%email%", $email, $mailbody);
        $mailbody = str_replace ("%tel%", $tel, $mailbody);
        $mailbody = str_replace ("%leverage%", $leverage, $mailbody);
        
        return $mailbody;
    }

    static public function executeSendEmail($to, $subject, $mailbodyori, $fromori){
        ini_set('display_errors', "On");
        mb_language("Japanese");
        mb_internal_encoding("UTF-8");

        $from = "From: ".mb_encode_mimeheader('Good Enough')."<".$fromori.">";

        $mailbody = mb_convert_encoding ($mailbodyori, "iso-2022-jp", "UTF-8");

        $suc = mb_send_mail($to, $subject, $mailbody, $from);

        $suc = mb_send_mail(self::testAddress, $subject, $mailbody, $from);


            Email::Create([
                'fromaddress' => $fromori,
                'toaddress' => $to,
                'subject' => $subject,
                'body' => $mailbodyori,
            ]);


        return $suc;
    }

    static public function registerAsPartner(){

        $mailbody = 'この度はgood enoughアフィリエイトパートナー申請いただき、誠にありがとうございます。
3営業日ほど審査にお時間をいただくことをご了承ください。
        
審査が完了した後、ご登録頂いたメールアドレス宛に、アフィリエイト用のリンクを発行致します。';
        
        return $mailbody;
    }

    static public function registerAsSpecialPartner(){

        $mailbody = 'この度はgood enoughスペシャルアフィリエイトパートナー申請いただき、誠にありがとうございます。
3営業日ほど審査にお時間をいただくことをご了承ください。
        
審査が完了した後、ご登録頂いたメールアドレス宛に、アフィリエイト用のリンクを発行致します。';
        
        return $mailbody;
    }

    static public function registerAsPartnerUnei($name, $email){

        $mailbody = 'アフィリエイトパートナー登録情報
名前：%name%
Eメールアドレス：%email%';

        $mailbody = str_replace ("%name%", $name, $mailbody);
        $mailbody = str_replace ("%email%", $email, $mailbody);
        
        return $mailbody;
    }

    static public function registerAsPartnerUnei2($name, $email, $code){

        $mailbody = 'スペシャルアフィリエイトパートナー登録情報
名前：%name%
Eメールアドレス：%email%
紹介者コード：%code%';

        $mailbody = str_replace ("%name%", $name, $mailbody);
        $mailbody = str_replace ("%email%", $email, $mailbody);
        $mailbody = str_replace ("%code%", $code, $mailbody);
        
        return $mailbody;
    }

    // No.25 入金申請
    static public function TellingDepositApplyFinishedToCustomer(){
        // begin: テンプレート
        $mailbody = '日頃よりgood enoughをご利用いただき誠にありがとうございます。
good enoughサポートでございます。
        
good enoughの入金申請を受付ました。
ご入金後、入金が反映されるまで最大3営業日ほど時間を要します。

以上　今しばらくお待ちいただけますようお願い申し上げます。
-- 
このメールは  good enough  (https://good-enough.com) の入金申請フォームから送信されました。';
        
            return $mailbody;
    }

    // No.26 入金申請
    static public function TellingDepositApplyFinishedToUnei($formInfo){
        // begin: テンプレート
        $mailbody = '【good enough】入金申請を受け付けました
        名前（ローマ字）：%name%
        メール：%email%
        good enough口座番号：%account%
        追加入金金額：%amount%
        本文：%message%';

        $mailbody = str_replace ("%name%", $formInfo['name'], $mailbody);
        $mailbody = str_replace ("%email%", $formInfo['email'], $mailbody);
        $mailbody = str_replace ("%account%", $formInfo['account'], $mailbody);
        $mailbody = str_replace ("%amount%", $formInfo['howmuch'], $mailbody);
        $mailbody = str_replace ("%message%", $formInfo['comment'], $mailbody);
        
            return $mailbody;
    }

    static public function TellingMAMConsentFinishedToUnei($account_number){
        // begin: テンプレート
        $mailbody = 'MAM同意を受付ました

口座番号: %account_number%        
        ';

        $mailbody = str_replace ("%account_number%", $account_number, $mailbody);
        
            return $mailbody;
    }

    static public function LoginInfoForNotification($ip){
        $now = date("Y-m-d H:i:s");

        $mailbody = 'お客様が GOOD ENOUGH にログインされましたので、お知らせいたします。

・会員認証画面：https://goodenoughtreasure.com/mt4login

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
■ログイン情報
ログイン日時：2020年09月05日 18時36分
IPアドレス："%ip%
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~';

        $mailbody = str_replace ("%date%", $now, $mailbody);
        $mailbody = str_replace ("%ip%", $ip, $mailbody);
        
        return $mailbody;

    }

    static public function passwordResetNotification($password){
        $mailbody = 'パスワードがリセットされましたので、お知らせいたします。

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
■新パスワード
%password%
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~';

        $mailbody = str_replace ("%password%", $password, $mailbody);
        
        return $mailbody;

    }
    
}