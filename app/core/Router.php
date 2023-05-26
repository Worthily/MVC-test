<?php

namespace app\core;

// include 'app\core\View.php';
// use app\core\View as View;

use app\core\View;

class Router{

    protected $routes = [];
    protected $params = [];

    function __construct(){
        $arr = require 'app/config/routes.php';

        foreach($arr as $key => $val) {
            $this->add($key, $val);
        }
    }
    
    public function add($route, $params) {
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }

    public function match(){
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach($this->routes as $route => $params){
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }
    
    public function run(){
        if ($this->match()){
           $controllerPath = 'app\controllers\\'.ucfirst($this->params['controller']).'Controller';
            // debug($controllerPath);
           if(class_exists($controllerPath)){
                $action = $this->params['action'].'Action';
                if(method_exists($controllerPath, $action)){
                    $controller = new $controllerPath($this->params);
                    $controller->$action();
                } else {
                    View::errorCode('404');
                }
           } else {
                View::errorCode('404');
           }
        } else {
            View::errorCode('403');
        }
    }

}