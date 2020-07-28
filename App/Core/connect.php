<?php

namespace App\Core;

class connect {
    
    private static $intance;
    
    static function getConn()
    {
        if(!isset(self::$intance) || (isset(self::$intance) && empty(self::$intance))){
            try {
                self::$intance = new \PDO("mysql:host=localhost;dbname=teste;charset=utf8",'root','');                
            } catch (\PDOException $exc) {
                echo $exc->getTraceAsString();
            }
        }
        return self::$intance;
    }
    
}
