<?php

namespace app\core;
use app\core\dev\Db;

abstract class Model {

    public $db;

    public function __construct(){
        $this->db = new Db;
    }
    
}