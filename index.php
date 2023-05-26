<?php
require 'app/core/dev/Dev.php';
// include 'app\core\Router.php';
// use app\core\Router as Router;
use app\core\Router;

spl_autoload_register(function($class = '') {
    $path = str_replace('\\', '/', $class. '.php');
    if(file_exists($path)) {
        require $path;
    }
});

$router = new Router();
$router->run();
