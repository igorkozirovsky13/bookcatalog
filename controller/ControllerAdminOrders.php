<?php
    class ControllerAdminOrders extends ControllerAdminPage {
        public function actionIndex(){
            $this->allOrders();
        }
        
        public function allOrders(){
            View::set('title','Order list');
            $orders = new ModelOrder();
            $result = $orders->allOrders();
            //print_r($result);
            if($result){
                $content = View::renderTemplate('adminOrders/allOrders.php',$result);
                View::set('content',$content);
            }
        }
        
        public function actionCompletedOrder(){
           // if(isset($_GET['id'])){
              //  $id = $_GET['id'];

                $orders = new ModelOrder();
                $result = $orders->completedOrder();
                if($result === true){
                    $message = View::renderSuccessMessage('orders completed!');
                }else{
                    $message = View::renderErrorMessage('orders not completed!');
                }
                View::set('message',$message);
                $this->allOrders();
              //  if($result == 0){
               //     $copmleted = 1;
              //  }
               //if($result == 1){
                //    $copmleted = 0;
              //  }
                
          //  }
               // $this->allOrders();
        }    
        
        public function actionDelOrders(){
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $orders = new ModelOrder();
                $result = $orders->delOrders($id);
                
                if($result == true){
                    $message = View::renderSuccessMessage('order delete!');
                }else{
                    $message = View::renderErrorMessage('order is not delete!');
                }
                View::set('message',$message);
                $this->allOrders();
            }
        }
        
    }
?>