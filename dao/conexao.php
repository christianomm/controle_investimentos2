<?php
 
class Conexao {
 
    public static $instance;
 
    private function __construct() {
        //
    }
 
    public static function getInstance() {
        if (!isset(self::$instance)) {
            try{
                self::$instance = new PDO('mysql:host=localhost;
                dbname=investimentos', 'root', '',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, 
                PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, 
                PDO::NULL_EMPTY_STRING);
            } catch(PDOException $e){
                echo $e->getMessage();
            }
            
        }
 
        return self::$instance;
    }
    public function prepare($sql){
        return self::getInstance()->prepare($sql);
    }
}
 
?>