<?php

namespace app\controllers;

use app\core\Controller;

class AccountController extends Controller {

    public function loginAction() {
        if(!empty($_POST)) {
            $this->view->redir('/');
        }
        $this->view->render('Вход');
    }

    public function registerAction() {
        $this->view->render('Регистрация');
    }

}
