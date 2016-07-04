<?php

class DB{
     
    const DB_HOST = '127.0.0.1';
    const DB_NAME = 'bookcatalog';
    const DB_USER = 'igorkozirovsky13';
    const DB_PORT = '3306';
    const DB_TYPE = 'mysql';
    
    private $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                             PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    private static $db=null;
    
      
    public static function getInstance(){
        try {
         if(self::$db===null){
              self::$db = new PDO(self::DB_TYPE.':host='.self::DB_HOST.';dbname='.self::DB_NAME, self::DB_USER, '');
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
         }
         return self::$db;
    }
       
        
        catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
    private function __construct(){}
    private function __clone(){}
    private function __wakeup(){}
}