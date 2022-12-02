<?php
namespace App\Site\Repository;
use App\Site\Model\Question;

class QuestionDetailedRepository extends AbstractGetableRepository
{

    protected static function getNomClePrimaire(): string
    {
        return 'idQuestion';
    }

    protected static function getNomTable(): string
    {
        return 'V_QUESTIONS';
    }

    protected static function builder(array $objetFormatTableau): Question
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