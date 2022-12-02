<?php
namespace App\Site\Repository;
use App\Site\Model\Question;

class QuestionRepository extends AbstractEditableRepository
{

    protected static function getNomsColonnes(): array
    {
        return ['titre', 'description', 'idUtilisateur', 'idMaladie', 'idReponseA'];
    }

    protected static function getNomClePrimaire(): string
    {
        return 'idQuestion';
    }

    protected static function getNomTable(): string
    {
        return 'QUESTIONS';
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
            $objetFormatTableau['datePoste']
        );
    }
}