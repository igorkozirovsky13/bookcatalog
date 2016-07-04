<?php
ini_set('display_errors',1);
    error_reporting(E_ALL);
        
    class ControllerGenre{
        private   $db = null;
        protected $data = array();
    
        public function __construct(){
     
     	    $this->db = DB::getInstance(); 
    
        }
        
        public function actionIndex(){
        
            return $this->actionInsertGenre();
            return $this->actionSelectGenre();
        }
        
        
        
        public function actionInsertGenre(){
            $sql = "INSERT INTO genre (type_of_genre) VALUES (:type_of_genre)";
            $res = $this->db->prepare($sql);
            
            $type_of_genre='Poema';
           
            
            $res->bindParam(':type_of_genre',$type_of_genre);
            $res->execute();
        }
        
        public function actionSelectGenre(){
            $sql = $this->db->query("SELECT idgenre,type_of_genre FROM genre");
            
            while($res = $sql->fetch(PDO::FETCH_OBJ)){
                print $res->idgenre;
                print $res->type_of_genre;
                
            }
        }
    
    }