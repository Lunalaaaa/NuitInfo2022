<?php
require_once __DIR__ . '/src/Lib/ClassLoader.php';
$loader = new App\Site\Lib\ClassLoader();
$loader->addNamespace('App\Site', __DIR__ . '/src');
$loader->register();

use App\Site\Controller\ForumManager;

if (isset($_POST['username']) & isset($_POST['password'])) {
    if (ForumManager::connection($_POST['username'], $_POST['password'])) {
        ForumManager::redirect('.');
    } else {
        ForumManager::redirect('./login.php');
    }
} else {
    ForumManager::afficheVue('login.html', 'Se Connecter');
}