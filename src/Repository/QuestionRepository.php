<?php

class QuestionRepository extends AbstractEditableRepository
{

    protected function getNomsColonnes(): array
    {
        return ['idQuestion', 'titre', 'description', 'idUtilisateur', 'idMaladie', 'idReponseA', 'datePoste'];
    }

    protected function getNomClePrimaire(): string
    {
        return 'idQuestion';
    }

    protected function getNomTable(): string
    {
        return 'QUESTIONS';
    }

    protected function builder(array $objetFormatTableau): Question
    {
        return new Question(
            $objetFormatTableau['idQuestion'],
            $objetFormatTableau['titre'],
            $objetFormatTableau['description'],
            $objetFormatTableau['idUtilisateur'],
            $objetFormatTableau['idMaladie'],
            $objetFormatTableau['idReponseA'],
            $objetFormatTableau['datePoste']
        );
    }
}