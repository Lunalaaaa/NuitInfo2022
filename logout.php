<?php
require_once __DIR__ . '/src/Lib/ClassLoader.php';
$loader = new App\Site\Lib\ClassLoader();
$loader->addNamespace('App\Site', __DIR__ . '/src');
$loader->register();

\App\Site\Lib\UserConnexion::getInstance()->disconnect();
\App\Site\Controller\Controller::redirect('./');