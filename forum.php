<?php

use App\Site\Controller\ForumManager;

require_once __DIR__ . '/src/Lib/ClassLoader.php';
$loader = new App\Site\Lib\ClassLoader();
$loader->addNamespace('App\Site', __DIR__ . '/src');
$loader->register();


if (isset($_GET['post'])) {
    $post = ForumManager::afficher($_GET['post']);
//    ForumManager::afficheVue("view.php", ["pagetitle" => "Forum","cheminVueBody"=>"detail.php","question"=> $post]);
} else {
    $tab = ForumManager::afficherTous();
    var_dump($tab);
//    ForumManager::afficheVue("view.php", ["pagetitle" => "Forum", "donnees" => $tab, "cheminVueBody"=>"FormulaireQuestion.html"]);
}

