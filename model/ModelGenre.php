<?php

class ModelGenre{
    private $db = null;
    protected $data = array();
    
    public function __construct(){
        $this->db = DB::getInstance();
    }
    
    public function allGenres(){
        $sql = $this->db->query("SELECT idgenre,type_of_genre FROM genre");
        $res = $sql->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }
    
    public function addGenre($data){
        $sql = "INSERT INTO genre (type_of_genre) VALUES (:type_of_genre)";
       	$res = $this->db->prepare($sql);
        
        $res->bindParam(':type_of_genre',$data['type_of_genre'],PDO::PARAM_STR);
        $res->execute();
        
        return true;
    }
    
    public function delGenre($idgenre){
        $sql = "DELETE FROM genre WHERE idgenre = :idgenre LIMIT 1";
        $res = $this->db->prepare($sql);
        
        $res->bindParam(':idgenre',$idgenre,PDO::PARAM_INT);
        $res->execute();
        
        return true;
    }
    
    
    
    public function updateGenre($data){
        $id = $data['id'];
        $type_of_genre = $data['type_of_genre'];
        
        if ($id && $type_of_genre) {
            $sql = ("UPDATE genre SET type_of_genre = :type_of_genre WHERE idgenre = :idgenre LIMIT 1");
            $res = $this->db->prepare($sql);
        
            $res->bindParam(':type_of_genre',$type_of_genre);
            $res->bindParam(':idgenre',$id);
            $res->execute();
        return true;
        } else {
            return false;
        }
    }
    
    public function getDataById($id) {
        $sql = $this->db->query("SELECT *
                    FROM genre
                    WHERE idgenre = '$id'");
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
}