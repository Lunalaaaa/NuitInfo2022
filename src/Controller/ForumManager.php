<?php

namespace App\Site\Controller;

use App\Site\Lib\UserConnexion;
use App\Site\Model\Question;
use App\Site\Model\Utilisateur;
use App\Site\Repository\MaladieRepository;
use App\Site\Repository\QuestionDetailedRepository;
use App\Site\Repository\QuestionRepository;
use App\Site\Repository\UtilisateurRepository;

class ForumManager extends Controller
{
    public static function afficherTous() : array{
        return QuestionDetailedRepository::selectAll(['idReponseA'=>null]);
    }

    public static function afficher(int $id){
        return QuestionDetailedRepository::select($id);
    }

    public static function getReponses(int $id) : array {
        return (QuestionDetailedRepository::selectAll(['idReponseA'=>$id]));
    }

    public static function getMaladies() : array {
        return MaladieRepository::selectAll();
    }

    public static function connection(string $pseudo, string $mdp) : bool{
        $utilisateur = UtilisateurRepository::selectAll(['pseudoUtilisateur'=>$pseudo])[0];
        return UserConnexion::paswdCheck($mdp, $utilisateur->getMdp()) && UserConnexion::getInstance()->connect($utilisateur->getIdUtilisateur());
    }

    public static function inscription(string $pseudo, string $email, string $mdp) {
        return UtilisateurRepository::create(new Utilisateur(null, $pseudo, $email, $mdp));
    }

    public static function poster(string $titre, string $description, int $maladie) {
        QuestionRepository::create(new Question(null, $titre, $description, UserConnexion::getInstance()->getConnectedUserChannel()->getIdUtilisateur(), $maladie));
    }

    public static function creerCompte(string $nom, string $mail, string $mdp) {
        UtilisateurRepository::create(new Utilisateur(null, $nom, $mail, $mdp));
    }

    public static function repondre(string $titre, string $description, int $idReponseA){
        $reponseA = QuestionRepository::select($idReponseA);
        QuestionRepository::create(new Question(null, $titre, $description, UserConnexion::getInstance()->getConnectedUserChannel()->getIdUtilisateur(), $reponseA->getIdMaladie(), $idReponseA));
    }
}