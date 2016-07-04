<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);
        
    class ControllerBook{
        private   $db = null;
        protected $data = array();
    
        public function __construct(){
     
     	    $this->db = DB::getInstance(); 
    
        }
        
        
        /*
        public function actionInsertBook(){
            $sql = "INSERT INTO book (title,description,price) VALUES (:title,:description,:price)";
            $res = $this->db->prepare($sql);
            
            $title='Evgeniy Onegin';
            $description = 'Book about human!';
            $price = 150.00;
            
            $res->bindParam(':title',$title);
            $res->bindParam(':description',$description);
            $res->bindParam(':price',$price);
            $res->execute();
        }
        */
        
        public function actionSelectBook(){
            $sql = $this->db->query("SELECT idbook,title,description,price,status FROM book");
            
            while($res = $sql->fetch(PDO::FETCH_OBJ)){
                print '</br>'.$res->idbook.'</br>';
                print $res->title.'</br>';
                print $res->description.'</br>';
                print $res->price.'</br>';
                print $res->status.'</br>';
            }
        }
        
        public function actionAllbook(){
		$sql=$this->db->query("SELECT CONCAT(author.name,'',author.sername) AS author,
		author.idauthor AS idauthor
		FROM author
		GROUP BY author.sername");
		
		while($res = $sql->fetch(PDO::FETCH_OBJ)){
               
               
                print $res->idauthor.'</br>';
                print $res->author.'</br>';
                
            }
		
		
	}
    
    }
    
   
    
    