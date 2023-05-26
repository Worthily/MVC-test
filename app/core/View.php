<?php

namespace app\core;

class View {

    public $route;
    public $path;
    public $layout = 'default';

    public function __construct($route) {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
        // debug($this->route);
    }
    public function render($title, $vars = []) {

        extract($vars);
        $viewPath = 'app/views/'.$this->path.'.php';
        if(file_exists($viewPath)){
            ob_start();
            require $viewPath;
            $content = ob_get_clean();
        } else {
            echo 'path не найден';
        }
       $layoutsPath = 'app/views/layouts/'.$this->layout.'.php';
        if(file_exists($layoutsPath)){
            require $layoutsPath;
        } else {
            echo 'layout не найден';
        }
        
    }


    public function redirect($url) {
        header('location: '. $url);
        exit;
    }

    public static function errorCode($code) {
        http_response_code($code);
        $path = 'app/views/errors/'.$code.'.php';
        if(file_exists($path)) {
            require $path;
        }
        exit;
    }

    public function message($status, $message) {
        exit(json_encode(['status' => $status, 'message' => $message]));
    }
    
    public function redir($url) {
        // var_dump($url); die;
        // exit(json_encode(['url' => $url]));
        exit($url);
    }

}