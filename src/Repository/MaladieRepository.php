<?php

class MaladieRepository extends AbstractEditableRepository
{

    protected function getNomTable(): string
    {
        return 'MALADIES';
    }

    protected function builder(array $objetFormatTableau): Maladie
    {
        return new Maladie(
            $objetFormatTableau['idMaladie'],
            $objetFormatTableau['nomMaladie'],
            $objetFormatTableau['description']
        );
    }

    protected function getNomClePrimaire(): string
    {
        return 'idMaladie';
    }

    protected function getNomsColonnes(): array
    {
        return ['idMaladie', 'nomMaladie', 'description'];
    }
}