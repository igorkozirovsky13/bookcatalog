<?php
class ControllerAdminBook extends ControllerAdminPage{

    public function actionIndex(){
        $this->allBooks();
    }
    
    public function allBooks(){
        View::set('title','Book List');
        $book = new ModelBook();
        $result = $book->allBooks();
        $content = View::renderTemplate('adminBook/allBooks.php', $result);
        View::set('content',$content);
    }
    
    public function actionAddBookForm(){
        View::set('title','Book Form');

        $author = new ModelAuthor();
        $authors = $author->allAuthors();

        $genre = new ModelGenre();
        $genres = $genre->allGenres();

        $content = View::renderTemplate('adminBook/addBookForm.php', array(
            'authors' => $authors,
            'genres' => $genres,
        )); 
        View::set('content',$content);
    }
    
    public function actionUpdateBookForm(){
        if(!empty($_GET['id'])){
            View::set('title','Edit Book Form'); 
            $book = new ModelBook();
            $bookInfo = $book->getDataById($_GET['id']);
            $content = View::renderTemplate('adminBook/updateBookForm.php', $bookInfo);    
            View::set('content',$content);
        } else {
            $message = View::renderErrorMessage('not book!');
            View::set('message', $message);
            $this->allBooks();
            }
        }
        
    public function actionDelBook(){
        if(isset($_GET['id'])){
            $idbook = $_GET['id'];
            $book = new ModelBook();
            $result = $book->delBook($idbook);
            if($result == true){
                $message = View::renderSuccessMessage('book delete!');
            }else{
                $message = View::renderErrorMessage('book not delete!');
            }
        }else{
                $message = View::renderErrorMessage('is not book!');
            }
            View::set('message',$message);
            $this->allBooks();
    }
    
    public function actionUpdateBook(){
        if(!empty($_POST['id']) && !empty($_POST['title']) 
        && !empty($_POST['description']) && !empty($_POST['price']) ){
            $book = new ModelBook();
            $result = $book->updateBook($_POST);
            
            if($result === true){
                $message = View::renderSuccessMessage('book update!');
            }else{
                $message = View::renderErrorMessage('book is not update!');
            }
            View::set('message',$message);
            $this->allBooks();
        }else{
            $message = View::renderErrorMessage('All fields are required');
            View::set('massage',$message);
            $this->actionEditBookForm();
        }
    }
    
    public function actionAddBook(){
        if(!empty($_POST['title']) & !empty($_POST['description'])
            && !empty($_POST['price'])){
            
            $book = new ModelBook();
            $bookInsertId = $book->addBook($_POST);
            //print $bookInsertId;
            
            $authors = $_POST['author'];
            $genres = $_POST['type_of_genre'];
             
            if (!empty($authors) & !empty($genres)) {
                $result = $book->addAuthorsToBook($bookInsertId, $authors);
                $result = $book->addGenresToBook($bookInsertId, $genres);
            }
            
             
            //print_r($genres);
            if(!empty($bookInsertId)){
                $message = View::renderSuccessMessage('book added!');
            }else{
                $message = View::renderErrorMessage('book is not added!');
            }
            View::set('message',$message);
            $this->allBooks();
        }else{
            $message = View::renderErrorMessage('Field title is required');
            View::set('message', $message);
            $this->actionAddBookForm();
        }
    }
}
        
