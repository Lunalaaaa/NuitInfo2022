<?php

namespace App\Repository;
use App\Model\AbstractDataObjet;
use App\Model\IInsertable;
use DatabaseConnection;

abstract class AbstractGetableRepository {
    public function selectAll(){
        $sql = "SELECT * FROM " . $this->getNomTable();
        $tab = [];
        $pdoStatement = DatabaseConnection::getPdo()->query($sql);
        foreach ($pdoStatement as $element){
            $tab = $this->builder($element);
        }
        return $tab;
    }

    public function select($id){
        $sql = "SELECT * from {$this->getNomTable()} WHERE {$this->getNomClePrimaire()} = :valeurTag";
        // Préparation de la requête
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);

        $values = array(
            "valeurTag" => $id,
        );
        // On donne les valeurs et on exécute la requête
        $pdoStatement->execute($values);

        // On récupère les résultats comme précédemment
        // Note: fetch() renvoie false si pas de voiture correspondante
        $objet = $pdoStatement->fetch();
        if(!$objet){
            return null;
        }
        else{
            return $this->builder($objet);
        }
    }



    protected abstract function getNomTable(): string;
    protected abstract function builder(array $objetFormatTableau) : IInsertable;
    protected abstract function getNomClePrimaire(): string;
}