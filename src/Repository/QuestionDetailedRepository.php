<?php

class QuestionDetailedRepository extends \App\Repository\AbstractGetableRepository
{

    protected function getNomClePrimaire(): string
    {
        return 'idQuestion';
    }

    protected function getNomTable(): string
    {
        return 'V_QUESTIONS';
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
            $objetFormatTableau['datePoste'],
            $objetFormatTableau['pseudoUtilisateur'],
            $objetFormatTableau['nomMaladie'],
            $objetFormatTableau['ReponseA'],
            $objetFormatTableau['pseudoReponseA']
        );
    }
}