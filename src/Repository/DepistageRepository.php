<?php
namespace App\Site\Repository;
use App\Site\Model\Depistage;

class DepistageRepository extends AbstractEditableRepository
{

    protected static function getNomsColonnes(): array
    {
        return ['idDepistage', 'nomDepistage'];
    }

    protected static function getNomClePrimaire(): string
    {
        return 'idDepistage';
    }

    protected static function getNomTable(): string
    {
        return 'DEPISTAGES';
    }

    protected static function builder(array $objetFormatTableau): Depistage
    {
        return new Depistage(
            $objetFormatTableau['idDepistage'],
            $objetFormatTableau['nomDepistage']
        );
    }
}