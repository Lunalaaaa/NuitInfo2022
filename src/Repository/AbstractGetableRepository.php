<?php

namespace App\Repository;
use App\Model\AbstractDataObjet;
use App\Model\IInsertable;
use DatabaseConnection;

abstract class AbstractGetableRepository {
    public function selectAll(?array $filter = []){
        $sql = "SELECT * FROM " . static::getNomTable() . " WHERE ";
        $values = [];
        foreach ($filter as $col=>$val) {
            $sql .= "$col = :{$col}Tag  AND ";
            $values[$col . 'Tag'] = $val;
        }
        $sql = substr($sql, 0, -6);
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $pdoStatement->execute($values);
        $elements = [];
        foreach ($pdoStatement as $elementFormatTableau) {
            $elements[] = $this->builder($elementFormatTableau);
        }
        return $elements;
    }

    public function select($id){
        $sql = "SELECT * from " . static::getNomTable() . " WHERE " . static::getNomClePrimaire() . "=:Tag";
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $pdoStatement->execute(["Tag" => $id]);
        $voiture = $pdoStatement->fetch();
        if ($voiture) {
            return $this->builder($voiture);
        }
        return null;
    }



    protected abstract function getNomTable(): string;
    protected abstract function builder(array $objetFormatTableau) : IInsertable;
    protected abstract function getNomClePrimaire(): string;
}