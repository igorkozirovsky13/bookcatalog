<?php
    class ModelBook{
        private $db = null;
        protected $data = array();
    
        public function __construct() {
        $this->db = DB::getInstance(); 
    }
    
    public function addBook($data){
        $response = false;
        $sql = "INSERT INTO book (title,description,price) VALUES (:title,:description,:price)";
        $res = $this->db->prepare($sql);
        
        $res->bindParam(':title',$data['title'],PDO::PARAM_STR);
        $res->bindParam(':description',$data['description'],PDO::PARAM_STR);
        $res->bindParam(':price',$data['price'],PDO::PARAM_INT);
        
        $res->execute();
        if (!$res) {
            $response = false;
        } else {
            $response = $this->db->lastInsertId();
        }
        return $response;
    }
    
    public function addAuthorsToBook($id, $authors) {
        $ids = array();
        foreach($authors as $author) {
            $ids[] = $this->addAuthorToBook($id, $author);
        }
        return $ids;
    }
    
    public function addAuthorToBook($bookId, $authorId) {
        $response = false;
        $sql = "INSERT INTO book_has_author (idbook, idauthor) VALUES (:idbook,:idauthor)";
        $res = $this->db->prepare($sql);
        
        $res->bindParam(':idbook', $bookId, PDO::PARAM_INT);
        $res->bindParam(':idauthor', $authorId, PDO::PARAM_INT);
        $res->execute();
        if (!$res) {
            $response = false;
        } else {
            $response = $this->db->lastInsertId();
        }
        return $response;
    }
    
    public function addGenresToBook($id,$genres){
        $ids = array();
        foreach($genres as $genre) {
            $ids[] = $this->addGenreToBook($id, $genre);
        }
        return $ids;
    }
    
    public function addGenreToBook($bookId,$genreId){
        $response = false;
        $sql = "INSERT INTO book_has_genre (idbook,idgenre) VALUES (:idbook,:idgenre)";
        $res = $this->db->prepare($sql);
        
        $res->bindParam(':idbook',$bookId,PDO::PARAM_INT);
        $res->bindParam('idgenre',$genreId,PDO::PARAM_INT);
        $res->execute();
        if(!$res){
            $response = false;
        }else{
            $response = $this->db->lastInsertId();
        }
        return $response;
    }
    
    public function allBooks(){
        $sql = $this->db->query("SELECT book.idbook,book.title,book.description,book.price,genre.type_of_genre,author.idauthor,
            GROUP_CONCAT(DISTINCT author.name,' ',author.sername SEPARATOR ',') as author
            FROM book
            LEFT JOIN book_has_author ON book_has_author.idbook = book.idbook
            LEFT JOIN author ON book_has_author.idauthor = author.idauthor
            LEFT JOIN book_has_genre ON book_has_genre.idbook = book.idbook
            LEFT JOIN genre ON book_has_genre.idgenre = genre.idgenre
            GROUP BY book.idbook");
        $res = $sql->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }
    
    public function getDataById($id) {
        $sql = $this->db->query("SELECT *
                    FROM book
                    WHERE idbook= '$id'");
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getDataByInfoBookId($id){
        $sql = $this->db->query("SELECT book.idbook,book.title,book.description,book.price,genre.type_of_genre,author.idauthor,
            GROUP_CONCAT(DISTINCT author.name,' ',author.sername SEPARATOR ',') as author
            FROM book
            LEFT JOIN book_has_author ON book_has_author.idbook = book.idbook
            LEFT JOIN author ON book_has_author.idauthor = author.idauthor
            LEFT JOIN book_has_genre ON book_has_genre.idbook = book.idbook
            LEFT JOIN genre ON book_has_genre.idgenre = genre.idgenre
			WHERE book.idbook = ".$id."
			GROUP BY book.title;
			    ");
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getDataByInfoGenreId($id){
        $sql = $this->db->query("SELECT book.idbook,book.title,book.description,book.price,genre.type_of_genre,author.idauthor,
            GROUP_CONCAT(DISTINCT author.name,' ',author.sername SEPARATOR ',') as author
            FROM book
            LEFT JOIN book_has_author ON book_has_author.idbook = book.idbook
            LEFT JOIN author ON book_has_author.idauthor = author.idauthor
            LEFT JOIN book_has_genre ON book_has_genre.idbook = book.idbook
            LEFT JOIN genre ON book_has_genre.idgenre = genre.idgenre
			WHERE genre.idgenre = ".$id."
			GROUP BY genre.type_of_genre;
			    ");
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function selectBooksByAuthorSername($sername){
        $sql = $this->db->query("SELECT book.idbook,book.title,book.description,book.price,genre.type_of_genre,author.idauthor,
			CONCAT(author.name,' ',author.sername) AS author
			FROM author 
			LEFT JOIN book_has_author ON book_has_author.idauthor = author.idauthor
			JOIN book ON book_has_author.idbook = book.idbook
			JOIN book_has_genre ON book_has_genre.idbook = book.idbook
			JOIN genre ON genre.idgenre = book_has_genre.idgenre
			WHERE author.sername = '".$sername."'
			GROUP BY author.idauthor, book.title;");
		return $sql->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function updateBook($data){
        $id = $data['id'];
        $title = $data['title'];
        $description = $data['description'];
        $price = $data['price'];
        if($id && $title && $description && $price){
            $sql = ("UPDATE book SET title = :title, description = :description, price = :price WHERE idbook = :idbook LIMIT 1 ");
            $res = $this->db->prepare($sql);
            
            $res->bindParam(':idbook',$id,PDO::PARAM_INT);
            $res->bindParam(':title',$title,PDO::PARAM_STR);
            $res->bindParam(':description',$description,PDO::PARAM_STR);
            $res->bindParam(':price',$price,PDO::PARAM_INT);
            
            $res->execute();
            return true;
        }else{
            return false;
        }
    }
    
    public function delBook($idbook){
        $sql = "DELETE FROM book WHERE idbook = :idbook LIMIT 1";
        $res = $this->db->prepare($sql);
        
        $res->bindParam(':idbook',$idbook, PDO::PARAM_INT);
		$res->execute();
		
		return true;
    }
    
}