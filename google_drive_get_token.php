<?php
#
# google drive access_tokenの取得
#
# https://code.google.com/apis/console/
# googleのプロジェクト作成
#
# 「Drive API」の項目ON
#
# client_id,client_secretの取得
# redirect_urlは「http://localhost」
#
# php composer.phar install
#
# localhostでアクセスできる所にこのファイルをシンボリックリンクでも張る
#
# アクセス、認証、done
#
require __DIR__ .'/vendor/autoload.php';
$client = new Soramugi\GoogleDrive\Client;
$client->setClientId('108898640535-lt7750up3kc5079tm505seie2nmdmdqo.apps.googleusercontent.com');
$client->setClientSecret('nP-1rnofnic7H2LehwqIoZh9');
$client->setScopes(array('https://www.googleapis.com/auth/drive'));
$client->setRedirectUri('https://drive-app-ztioge.c9users.io/google_drive_get_token.php');
if (isset($_GET['code'])) {
   $client->authenticate();
   echo $client->getAccessToken();
} else {
  $authUrl = $client->createAuthUrl();
  echo "<a href='{$authUrl}'>認証ページへ</a>";
}