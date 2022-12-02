<?php

namespace App\Site\Repository;

use App\Site\Model\IInsertable;
use PDOException;

abstract class AbstractEditableRepository extends AbstractGetableRepository{
    public static function create(IInsertable $object) : bool{
        $sql = "INSERT INTO " . static::getNomTable() . " (";
        foreach (static::getNomsColonnes() as $col) {
            $sql .= $col . ", ";
        }
        $sql = substr($sql, 0, -2) .  ") VALUES (";
        $values = array();
        $elementTable = $object->formatTableau();
        foreach (static::getNomsColonnes() as $col) {
            $sql .= ":" . $col . "Tag, ";
            $values[$col . "Tag"] = $elementTable[$col];
        }
        $sql = substr($sql, 0, -2) . ")";
        try {
            DatabaseConnection::getPdo()->prepare($sql)->execute($values);
            return true;
        } catch(PDOException $e) {
            return false;
        }
    }

    public static function delete(string $valeurClePrimaire){
        $sql = "DELETE FROM " . static::getNomTable() . " WHERE " . static::getNomClePrimaire() . "=:Tag";
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $values = array(
            "Tag" => $valeurClePrimaire
        );
        $pdoStatement->execute($values);
        return $pdoStatement->rowCount() > 0;
    }

    public static function update(IInsertable $object): bool{
        $sql = "UPDATE " . static::getNomTable() . " SET ";
        $values = array();
        $elementTable = $object->formatTableau();
        foreach (static::getNomsColonnes() as $col) {
            if (static::getNomClePrimaire() != $col) $sql .= $col . "=:" . $col . "Tag, ";
            $values[$col . "Tag"] = $elementTable[$col];
        }
        $sql = substr($sql, 0, -2);
        $sql .= " WHERE " . static::getNomClePrimaire() . "=:" . static::getNomClePrimaire() . "Tag";
        try {
            DatabaseConnection::getPdo()->prepare($sql)->execute($values);
            return true;
        } catch(PDOException $e) {
            return false;
        }
    }



    protected static abstract function getNomsColonnes(): array;
    protected static abstract function getNomClePrimaire(): string;
}