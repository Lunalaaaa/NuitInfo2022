<?php
require_once __DIR__ . '/src/Lib/ClassLoader.php';
$loader = new App\Site\Lib\ClassLoader();
$loader->addNamespace('App\Site', __DIR__ . '/src');
$loader->register();

use App\Site\Controller\ForumManager;
if (isset($_POST['titre']) & isset($_POST['description']) & isset($_POST['maladie'])) {
    ForumManager::poster($_POST['titre'], $_POST['description'], $_POST['maladie']);
}
if ((isset($_POST['reponse']) & isset($_POST['description']) & isset($_POST['question']))) {
    ForumManager::repondre($_POST['reponse'], $_POST['description'], $_POST['question']);
}
ForumManager::redirect('./forum.php' . (isset($_POST['question']) ? '?post=' . $_POST['question'] : ''));
