<?php

class DepistageRepository extends AbstractEditableRepository
{

    protected function getNomsColonnes(): array
    {
        return ['idDepistage', 'nomDepistage'];
    }

    protected function getNomClePrimaire(): string
    {
        return 'idDepistage';
    }

    protected function getNomTable(): string
    {
        return 'DEPISTAGES';
    }

    protected function builder(array $objetFormatTableau): Depistage
    {
        return new Depistage(
            $objetFormatTableau['idDepistage'],
            $objetFormatTableau['nomDepistage']
        );
    }
}