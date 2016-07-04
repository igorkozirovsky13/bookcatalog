<?php
    
class ModelAuthor{
    
    private   $db = null;
    protected $data = array();

    public function __construct() {
        $this->db = DB::getInstance(); 
    }

    public function addAuthor($data){
        $sql = "INSERT INTO author (name,sername) VALUES (:name,:sername)";
		$res = $this->db->prepare($sql);
		
		$res->bindParam(':name',$data['name'], PDO::PARAM_STR);
        $res->bindParam(':sername',$data['sername'], PDO::PARAM_STR);
        $res->execute();
        	
        return true;
    }
    
    public function getDataById($id) {
        $sql = $this->db->query("SELECT *
                    FROM author
                    WHERE idauthor = '$id'");
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function allAuthors(){
        $sql = $this->db->query("SELECT CONCAT(author.name,' ',author.sername) AS author,
		                        author.idauthor AS idauthor
		                        FROM author
		                        GROUP BY author.sername");
        $res = $sql->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }
    
    public function delAuthor($idauthor){
        $sql = "DELETE FROM author WHERE idauthor = :idauthor LIMIT 1";
        $res = $this->db->prepare($sql);
        
        $res->bindParam(':idauthor',$idauthor, PDO::PARAM_INT);
		$res->execute();
		
		return true;
    }
    
    public function updateAuthor($data){
        $id = $data['id'];
        $sername = $data['sername'];
        $name = $data['name'];
        if ($id && $sername && $name) {
            $sql = ("UPDATE author SET name = :name, sername = :sername WHERE idauthor = :idauthor LIMIT 1");
            $res = $this->db->prepare($sql);
            
            $res->bindParam(':name',$name);
            $res->bindParam(':sername',$sername);
            $res->bindParam(':idauthor',$id);
            $res->execute();
        return true;
        } else {
            return false;
        }
    }
}