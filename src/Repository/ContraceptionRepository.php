<?php

class ContraceptionRepository extends AbstractEditableRepository
{

    protected function getNomsColonnes(): array
    {
        return ['idContraception', 'nomContraception', 'sexe'];
    }

    protected function getNomClePrimaire(): string
    {
        return 'idContraception';
    }

    protected function getNomTable(): string
    {
        return 'CONTRACEPTIONS';
    }

    protected function builder(array $objetFormatTableau): Contraception
    {
        return new Contraception(
            $objetFormatTableau['idContraception'],
            $objetFormatTableau['nomContraception'],
            $objetFormatTableau['sexe']
        );
    }
}