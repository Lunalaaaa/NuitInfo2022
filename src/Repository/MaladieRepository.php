<?php
namespace App\Site\Repository;
use App\Site\Model\Maladie;

class MaladieRepository extends AbstractEditableRepository
{

    protected static function getNomTable(): string
    {
        return 'MALADIES';
    }

    protected static function builder(array $objetFormatTableau): Maladie
    {
        return new Maladie(
            $objetFormatTableau['idMaladie'],
            $objetFormatTableau['nomMaladie'],
            $objetFormatTableau['description']
        );
    }

    protected static function getNomClePrimaire(): string
    {
        return 'idMaladie';
    }

    protected static function getNomsColonnes(): array
    {
        return ['idMaladie', 'nomMaladie', 'description'];
    }
}