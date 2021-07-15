<?php
require_once 'PHPGangsta/GoogleAuthenticator.php';

$ga = new PHPGangsta_GoogleAuthenticator();

// 秘密鍵の生成
$secret = $_GET["secret"];

// サービス名
$title = 'good enough';

// ユーザー名
$name = $_GET["user"];

// QRコードURLの生成と表示
$qrCodeUrl = $ga->getQRCodeGoogleUrl($name, $secret, $title);

echo "<iframe src='{$qrCodeUrl}' width='210' height='210'></iframe>\n\n";


/*
showQR?user=XXX&secret=YYY
で、秘密鍵YYYに対するQRコードを生成(アプリ上でユーザ名の欄にXXXが表示される)

例
http://localhost:8888/GoogleAuthenticator/showQR.php?user=XXX&secret=6QN5UPVS7ZRHBBHK
 */