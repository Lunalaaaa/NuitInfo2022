<?php
require_once __DIR__ . '/src/Lib/ClassLoader.php';
$loader = new App\Site\Lib\ClassLoader();
$loader->addNamespace('App\Site', __DIR__ . '/src');
$loader->register();


if (isset($_POST['pseudoUtilisateur']) & isset($_POST['mail']) & isset($_POST['mdp'])) {
    \App\Site\Controller\ForumManager::creerCompte($_POST['pseudoUtilisateur'], $_POST['mail'], $_POST['mdp']);
}