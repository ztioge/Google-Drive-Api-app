<!DOCTYPE html>
<html>
   <?php
require_once __DIR__ . '/vendor/autoload.php';

$client = new Soramugi\GoogleDrive\Client;

//El clientID lo tengo en un archivo en local
$client->setClientId('');

//EL Client secret lo tengo en un arhivo local.
$client->setClientSecret('');

//El acces Token lo tengo en un arcgivo en local.
$token = '{"access_token":"","expires_in":3600,"refresh_token":"1\/w1Bz11LUl-qHaxZgJo_nV7TSIAi1jYT7_2CxXMSUVa4","token_type":"Bearer","created":1477561005}';
$client->setAccessToken($token);

#Objektua sortzen degu
$files = new Soramugi\GoogleDrive\Files($client);
$file = new Soramugi\GoogleDrive\File($client);

//Carpeta bakoitzeko barruan dauden artxiboak listatzen ditugu, ta karpetak ere.
foreach ($files->listFiles()->getItems() as $item) {
    if (!$item->getLabels()->getTrashed()) {
         echo '<td>' ."file : {$item->getTitle()}\n". '</td>';
         echo "<br>";
    }
}

echo "EL archivo buscado:";
echo "<br>";
foreach($files->searchTitle('Empresa') as $file) {
    if ($file->isFolder()) {
        echo $file->getTitle() . "\n";
        echo "<br>";
        echo $file->getMimeType() . "\n";
        echo "<br>";
        echo $file->getId() . "\n";
    }
}
?> 
</html>
