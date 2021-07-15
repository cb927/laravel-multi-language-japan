<?php
require_once 'PHPGangsta/GoogleAuthenticator.php';

$ga = new PHPGangsta_GoogleAuthenticator();

// ユーザーごとに保存してある秘密鍵
$secret = $_GET["secret"];

// ユーザーが生成したTOTP
$oneCode = $_GET["oneCode"];

// サーバーとクライアントで許容する時間のずれ
// $discrepancy × 30秒 許容します（デフォルト値は1です）
$discrepancy = 0;

// TOTPの検証
$checkResult = $ga->verifyCode($secret, $oneCode, $discrepancy);
if ($checkResult) {
    echo 'OK';
} else {
    echo 'FAILED';
}

/*
例
http://localhost:8888/GoogleAuthenticator/login.php?secret=6QN5UPVS7ZRHBBHK&oneCode=022152
*/