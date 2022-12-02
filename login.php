<?php
require_once __DIR__ . '/src/Lib/ClassLoader.php';
$loader = new App\Site\Lib\ClassLoader();
$loader->addNamespace('App\Site', __DIR__ . '/src');
$loader->register();

use App\Site\Controller\ForumManager;

if (isset($_POST['username']) & isset($_POST['password'])) {
    if (ForumManager::connection($_POST['username'], $_POST['password'])) {
        echo "Connecte en tant que ";
        var_dump(\App\Site\Lib\UserConnexion::getInstance()->getConnectedUserChannel());
    } else {
        echo "couldn't connect";
    }
} else {
    echo "missing arg";
}