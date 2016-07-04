<?php
    
    class ControllerMainBook extends ControllerMainPage{
        
    public function actionIndex(){
        $this->mainAllBooks();
    }
    
    public function mainAllBooks(){
        View::set('title','All books list');
        $book = new ModelBook();
        $result = $book->allBooks();
        if($result){
            $content = View::renderTemplate('mainBook/mainAllBooks.php',$result);    
            View::set('content',$content);
        }
    }
    
    public function setSidebar(){
        $genre = new ModelGenre();
        $genres = $genre->allGenres();
        
        if($genres){
            $sidebar = View::renderTemplate('mainSidebar.php',array(
                'genres' => $genres,
            ));
            View::set('sidebar', $sidebar);
        }
    }
    
    
    public function actionSelectBooksByGenreId($id = ''){
        if(empty($id)){
            $id = $_GET['id'];
        }
        
        if(!empty($id)){
            $idgenre = $id;
            View::set('title','All the books by genre!');
            $book = new ModelBook();
            $genreInfo = $book->getDataByInfoGenreId($idgenre);
            //print_r($bookInfo);
            $content = View::renderTemplate('mainBook/selectBooksByGenreId.php',$genreInfo);
            View::set('content',$content);
        }else{
            $message = View::renderErrorMessage('Genre list not found!');
            View::set('message',$message);
        }
    }
    
    public function actionSelectBooksByAuthorSername(){
        View::set('title','All the books by surname!');
        if(!empty($_POST['sername'])){
          
          $sername = $_POST['sername'];

            if($sername){   
                $book = new ModelBook();
                $authorSername = $book->selectBooksByAuthorSername($sername);
                    if($authorSername){
                        $content = View::renderTemplate('mainBook/selectBooksByAuthorSername.php',$authorSername);
                        View::set('content',$content);
                    }else{
                        $message = View::renderErrorMessage('книг даного автора не найдено!');
                        View::set('message',$message);
                    }
            }else{
                $message = View::renderErrorMessage('Вы ввели некорректные данные в форму с фамилией.');
                View::set('message',$message);
            }
        }
    }
    
    public function actionBookInfoForm($id = ''){
        if (empty($id)) {
            $id = $_GET['id'];
        }
        
        if(!empty($id)){
            $idbook = $id;
            View::set('title','BookInfo Form'); 
            $book = new ModelBook();
            $bookInfo = $book->getDataByInfoBookId($idbook);
            $content = View::renderTemplate('mainBook/bookInfoForm.php', $bookInfo);    
            View::set('content',$content);
        } else {
            $message = View::renderErrorMessage('the data is not correct!');
            View::set('message', $message);
            }
        }
        
    public function actionAddOrder(){
        //print_r($_POST);
        //проверку
        if(!empty($_POST['id']) && !empty($_POST['surname']) && 
            !empty($_POST['adress']) && !empty($_POST['order_count'])){
            
            
            $id = $_POST['id'];
            $surname = $_POST['surname'];
            $adress = $_POST['adress'];
            $order_count = $_POST['order_count'];
            
            $book = new ModelBook();
            $bookInfo = $book->getDataById($id);
        //print_r($bookInfo);
        //если ок 
            //вызываем модель заказа для создания заказа
           
            $orders = new ModelOrder();
            $result = $orders->createOrder(array(
                "idbook"=>$id,
                "price"=>$bookInfo[0]->price,
                "surname"=>$surname,
                "adress"=>$adress,
                "order_count"=>$order_count
            ));
                
            if($result == true){
                //если ок
                    //выводим сообщение ок
                $message = View::renderSuccessMessage('Заказ принят!');
                
            }        
                //если не ок
            else{
                $message = View::renderErrorMessage('Заказ не принят!');
            }
        }else{
                //сообщение не ок
        //если не все поля введинеы
            //сообщения не все поля

            $message = View::renderErrorMessage('Вы ввели не все поля');
            
        //выводим форму    
           
        }
         View::set('message', $message);
         $this->actionBookInfoForm($_POST['id']);
         
                
       
                
    }
    
    
}  