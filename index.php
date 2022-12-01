<?php
require_once __DIR__ . '/src/Repository/DatabaseConnection.php';
$sql = "SELECT * FROM MALADIES";
$pdoStatement = DatabaseConnection::getPdo()->query($sql);
$pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
foreach($pdoStatement as $voitureFormatTableau){
    var_dump($voitureFormatTableau);
}
