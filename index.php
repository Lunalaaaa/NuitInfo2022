<?php
require_once __DIR__ . '/src/Lib/ClassLoader.php';
$loader = new App\Site\Lib\ClassLoader();
$loader->addNamespace('App\Site', __DIR__ . '/src');
$loader->register();


$sql = "SELECT * FROM MALADIES";
$pdoStatement = DatabaseConnection::getPdo()->query($sql);
$pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
foreach($pdoStatement as $voitureFormatTableau){
    var_dump($voitureFormatTableau);
}
