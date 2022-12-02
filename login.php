<?php
require_once __DIR__ . '/src/Lib/ClassLoader.php';
$loader = new App\Site\Lib\ClassLoader();
$loader->addNamespace('App\Site', __DIR__ . '/src');
$loader->register();

use App\Site\Controller\ForumManager;

if (isset($_POST['username']) & isset($_POST['password'])) {
    var_dump($_POST);
    if (ForumManager::connection($_POST['username'], $_POST['password'])) {
        echo "Connecte en tant que ";
        var_dump(\App\Site\Lib\UserConnexion::getInstance()->getConnectedUserChannel());
    } else {
        echo "couldn't connect";
    }
} else {
    echo "
    <form action=\"./login.php\" method=\"post\">
        <input type=\"text\" name=\"username\" placeholder=\"username\">
        <input type=\"password\" name=\"password\" placeholder=\"password\">
        <input type=\"submit\" value=\"login\">
    </form>
    ";
}