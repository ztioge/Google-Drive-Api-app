<?php
require_once __DIR__ . '/vendor/autoload.php';

$client = new Soramugi\GoogleDrive\Client;

$client->setClientId('108898640535-lt7750up3kc5079tm505seie2nmdmdqo.apps.googleusercontent.com');
$client->setClientSecret('nP-1rnofnic7H2LehwqIoZh9');

$token = '{"access_token":"ya29.Ci-JA7xgd2TFITLuUeL-QzTY5C0dphFnKfVThPcggdmyXogNF6fcAFndnojslWf3pA","expires_in":3600,"refresh_token":"1\/w1Bz11LUl-qHaxZgJo_nV7TSIAi1jYT7_2CxXMSUVa4","token_type":"Bearer","created":1477561005}';
$client->setAccessToken($token);


$files = new Soramugi\GoogleDrive\Files($client);

foreach ($files->listFiles()->getItems() as $item) {
    if (!$item->getLabels()->getTrashed()) {
        echo "file : {$item->getTitle()}\n";
        //echo "{$item->getId()}\n";
    }
}
?>