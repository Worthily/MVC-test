<?php

namespace app\models;
use app\core\Model;

class Main extends Model {

    // public function __construct() {
    //     echo 'модель работает';
    // }

    public function getNews(){
        $result = $this->db->row('SELECT title, descr FROM news');
        return $result;
    }
}