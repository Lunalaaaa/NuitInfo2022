<?php

namespace App\Site\Repository;

use App\Site\Model\IInsertable;

abstract class AbstractGetableRepository {
    public static function selectAll(?array $filter = []){
        $sql = "SELECT * FROM " . static::getNomTable() . " WHERE ";
        $values = [];
        foreach ($filter as $col=>$val) {
            if ($val == null) {
                $sql .= "$col IS NULL  AND ";
            } else {
                $sql .= "$col = :{$col}Tag  AND ";
                $values[$col . 'Tag'] = $val;
            }

        }
        $sql = substr($sql, 0, -6);
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $pdoStatement->execute($values);
        $elements = [];
        foreach ($pdoStatement as $elementFormatTableau) {
            $elements[] = static::builder($elementFormatTableau);
        }
        return $elements;
    }

    public static function select($id){
        $sql = "SELECT * from " . static::getNomTable() . " WHERE " . static::getNomClePrimaire() . "=:Tag";
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $pdoStatement->execute(["Tag" => $id]);
        $voiture = $pdoStatement->fetch();
        if ($voiture) {
            return static::builder($voiture);
        }
        return null;
    }

    public static function search(?array $filter = [], ?bool $and = true): array
    {
        $sql = "SELECT * FROM " . static::getNomTable() . " WHERE ";
        $values = [];
        foreach ($filter as $col=>$val) {
            $sql .= "$col LIKE '%{$val}%'  " . ($and ? 'AND ' : ' OR ');
//            $values[$col . 'Tag'] = $val;
        }
        $sql = substr($sql, 0, -6);
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $pdoStatement->execute($values);
        $elements = [];
        foreach ($pdoStatement as $elementFormatTableau) {
            $elements[] = static::builder($elementFormatTableau);
        }
        return $elements;
    }



    protected static abstract function getNomTable(): string;
    protected static abstract function builder(array $objetFormatTableau) : IInsertable;
    protected static abstract function getNomClePrimaire(): string;
}