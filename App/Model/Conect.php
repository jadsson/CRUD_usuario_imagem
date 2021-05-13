<?php

namespace App\Model;

class Conect {
    private static $instance;

    public static function Conn()
    {
        if(!isset(self::$instance)) {

            self::$instance = new \PDO('mysql:host=localhost;dbname=pdo;charset=utf8','root', 'root');
        }
        return self::$instance;
    }

}