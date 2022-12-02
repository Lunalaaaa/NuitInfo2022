<?php

namespace App\Site\Controller;

use App\Site\Lib\UserConnexion;
use App\Site\Model\Question;
use App\Site\Repository\MaladieRepository;
use App\Site\Repository\QuestionDetailedRepository;
use App\Site\Repository\QuestionRepository;

class ForumManager extends Controller
{
    public static function afficherTous() : array{
        return QuestionDetailedRepository::selectAll();
    }

    public static function afficher(int $id){
        return QuestionDetailedRepository::select($id);
    }

    public static function poster(string $titre, string $description, string $maladie) {
        QuestionRepository::create(new Question(null, $titre, $description, UserConnexion::getInstance()->getConnectedUserChannel()->getIdUtilisateur(), MaladieRepository::selectAll(['nomMaladie'=>$maladie])[0]->getIdMaladie()));
    }

    public static function repondre(string $titre, string $description, int $idReponseA){
        $reponseA = QuestionRepository::select($idReponseA);
        QuestionRepository::create(new Question(null, $titre, $description, UserConnexion::getInstance()->getConnectedUserChannel()->getIdUtilisateur(), $reponseA->getIdMaladie(), $idReponseA));
        Controller::afficheVue("view.php", ["pagetitle" => "Reponse Forum","cheminVueBody"=>"ForumRepondre.php"]);
    }
}