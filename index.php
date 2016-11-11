<!DOCTYPE html>
<html>
    
        <form action="index.php" method="get">
            <input type="text" name="titulo"/>
            <input type="submit" value="Submit" name="submit"/>
        </form>
<?php
require_once __DIR__ . '/vendor/autoload.php';

$client = new Soramugi\GoogleDrive\Client;

//El clientID lo tengo en un archivo en local
$client->setClientId('');

//EL Client secret lo tengo en un arhivo local.
$client->setClientSecret('');

//El acces Token lo tengo en un archivo en local.
$token = '{"access_token":"","expires_in":3600,"refresh_token":"1\/w1Bz11LUl-qHaxZgJo_nV7TSIAi1jYT7_2CxXMSUVa4","token_type":"Bearer","created":1477561005}';
$client->setAccessToken($token);

#Objektua sortzen degu
$files = new Soramugi\GoogleDrive\Files($client);
$file = new Soramugi\GoogleDrive\File($client);

//Carpeta bakoitzeko barruan dauden artxiboak listatzen ditugu, ta karpetak ere.
foreach ($files->listFiles()->getItems() as $item) {
    if (!$item->getLabels()->getTrashed()) {
         echo "file : {$item->getTitle()}\n";
         echo "<br>";
    }
}

if(isset($_GET["submit"])){
    echo "<br>";
    echo "La carpeta buscada:";
    echo "<br>";
    foreach($files->searchTitle($_GET["titulo"]) as $file) {
        if ($file->isFolder()) {
            echo $file->getTitle();
            echo "<br>";
            echo $file->getMimeType();
            echo "<br>";
            echo $file->getId();
        }else{
            echo "El titulo que buscas no es una carpeta";
        }
    }
}
?> 
</html>
