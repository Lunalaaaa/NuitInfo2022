<?php
require_once __DIR__ . '/src/Lib/ClassLoader.php';
$loader = new App\Site\Lib\ClassLoader();
$loader->addNamespace('App\Site', __DIR__ . '/src');
$loader->register();


if (!isset($_GET['p'])) $_GET['p'] = 'index';
\App\Site\Controller\Controller::afficheVue('/Histoire/' . $_GET['p'] . '.html');