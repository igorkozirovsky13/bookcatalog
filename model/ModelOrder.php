<?php 
    class ModelOrder{
        private $db = null;
        protected $data = array();
    
        public function __construct() {
        $this->db = DB::getInstance();
        }
        
        public function createOrder($orders){
            //insert сделать!!
          // print_r($orders);
            $idbook = $orders['idbook'];
            $price = $orders['price'];
            $surname = $orders['surname'];
            $adress = $orders['adress'];
            $order_count = $orders['order_count'];
            
            $sql = "INSERT INTO `orders` (`idbook`,`price`,`surname`,`adress`,`order_count`,`dateorders`) 
            VALUES(:idbook,:price,:surname,:adress,:order_count,:dateorders)";
            $res = $this->db->prepare($sql);
            
            $res->bindParam(':idbook',$idbook,PDO::PARAM_INT);
            $res->bindParam(':price',$price);
            $res->bindParam(':surname',$surname,PDO::PARAM_STR);
            $res->bindParam(':adress',$adress,PDO::PARAM_STR);
            $res->bindParam(':order_count',$order_count,PDO::PARAM_INT);
            $res->bindParam(':dateorders',$dateorders);
            
            $res->execute();
            return true;
        }
        
        public function allOrders(){
            
            $sql = $this->db->query("SELECT `orders`.*,book.title FROM `orders` LEFT JOIN book ON orders.idbook = book.idbook " );
            $res = $sql->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }
        
        public function completedOrder(){
            
            $sql = ("UPDATE `orders` SET `completed` = '1'  WHERE id = id ");
            $res = $this->db->prepare($sql);
            $res->execute();
            return true;
        } 
        
        
        public function delOrders($id){
            $sql = ("DELETE FROM `orders` WHERE id = :id LIMIT 1");
            $res = $this->db->prepare($sql);
            
            $res->bindParam(':id',$id,PDO::PARAM_INT);
            $res->execute();
            return true;
        }
        
    }    
?>