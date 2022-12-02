<?php

class Forum extends Controller {
    public function selectAll(){
        $tab = (new QuestionRepository())->selectAll();
        Controller::afficheVue("view.php", ["pagetitle" => "Forum", "donnees" => $tab, "cheminVueBody"=>"FormulaireQuestion.html"]);
    }

    public function afficher(){
        $id=$_GET["idQuestion"];
        $question=(new QuestionRepository())->select($id);
        Controller::afficheVue("view.php", ["pagetitle" => "Forum","cheminVueBody"=>"detail.php","question"=> $question]);
    }

    public function repondre(){
        $id = $_GET["idQuestion"];
        $titre = $_GET["titre"];
        $reponse = $_GET["reponse"];
        $login = $_GET["login"];
        $idMaladie = $_GET["idMaladie"];
        (new QuestionRepository())->create($id, $titre, $reponse, $login, $idMaladie);
        Controller::afficheVue("view.php", ["pagetitle" => "Reponse Forum","cheminVueBody"=>"ForumRepondre.php"]);
    }
}
