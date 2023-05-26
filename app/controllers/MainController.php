<?php

namespace app\controllers;

use app\core\Controller;
use app\core\dev\Db;

class MainController extends Controller {

    public function indexAction() {
        $result = $this->model->getNews();
        $vars = [
            'news' => $result,
        ];
        $this->view->render('Главная страница', $vars);
    }
}
