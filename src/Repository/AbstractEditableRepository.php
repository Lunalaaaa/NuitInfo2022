<?php

use App\Model\IInsertable;
use App\Repository\AbstractGetableRepository;

abstract class AbstractEditableRepository extends AbstractGetableRepository{
    public function create(IInsertable $object) : bool{
        $valuesObject = $object->formatTableau();
        $array = $this->getNomsColonnes();
        $colonnesTag = "";
        foreach ($array as $item) {
            $colonnesTag = $colonnesTag . ":" . $item . "Tag,";
        }
        $colonnesTag = rtrim($colonnesTag,",");

        $colonnes = "";
        foreach ($array as $item) {
            $colonnes = $colonnes . $item . ",";
        }
        $colonnes = rtrim($colonnes,",");

        $sql = "INSERT INTO {$this->getNomTable()} ({$colonnes}) VALUES ({$colonnesTag})";
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);

        try{
            $pdoStatement->execute($valuesObject);
            return true;
        }
        catch (PDOException $ex){
            return false;
        }
    }

    public function delete(string $valeurClePrimaire){
        $sql = "DELETE FROM {$this->getNomTable()} WHERE {$this->getNomClePrimaire()} = :valeurTag";
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $values = array(
            "valeurTag" => $valeurClePrimaire,
        );
        try{
            $pdoStatement->execute($values);
            return true;
        }
        catch (PDOException $ex){
            return false;
        }
    }

    public function update(IInsertable $object): void{
        $valuesObject = $object->formatTableau();
        $array = $this->getNomsColonnes();
        $colonnes = "";
        foreach ($array as $item) {
            //if($_GET[$item] != '') {
            $colonnes = $colonnes . $item . " =:" . $item . "Tag,";
            //}
        }
        $colonnes = rtrim($colonnes,",");
        $sql = "UPDATE {$this->getNomTable()} SET $colonnes WHERE {$this->getNomClePrimaire()}=:{$this->getNomClePrimaire()}Tag;";
        var_dump($sql);
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        var_dump($valuesObject);
        $pdoStatement->execute($valuesObject);
    }



    protected abstract function getNomsColonnes(): array;
    protected abstract function getNomClePrimaire(): string;
}