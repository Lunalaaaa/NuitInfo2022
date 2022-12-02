<?php
namespace App\Site\Repository;
use App\Site\Model\Contraception;

class ContraceptionRepository extends AbstractEditableRepository
{

    protected static function getNomsColonnes(): array
    {
        return ['idContraception', 'nomContraception', 'sexe'];
    }

    protected static function getNomClePrimaire(): string
    {
        return 'idContraception';
    }

    protected static function getNomTable(): string
    {
        return 'CONTRACEPTIONS';
    }

    protected static function builder(array $objetFormatTableau): Contraception
    {
        return new Contraception(
            $objetFormatTableau['idContraception'],
            $objetFormatTableau['nomContraception'],
            $objetFormatTableau['sexe']
        );
    }
}