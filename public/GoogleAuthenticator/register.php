<?php
require_once 'PHPGangsta/GoogleAuthenticator.php';

$ga = new PHPGangsta_GoogleAuthenticator();

// 秘密鍵の生成
$secret = $ga->createSecret();

echo "{$secret}";

/*
秘密鍵を生成するのみ
*/