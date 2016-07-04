<?php
class ControllerAdminGenre extends ControllerAdminPage{
    
    public function actionIndex(){
        $this->allGenres();
    }
    
    public function allGenres(){
        View::set('title','List Genre');
        $genre = new ModelGenre();
        $result = $genre->allGenres();
        if($result){
            $content = View::renderTemplate('adminGenre/allGenres.php',$result);
            View::set('content',$content);
        }
    }
    
    public function actionAddGenreForm(){
        View::set('title','Genre Form');
        $content = View::renderTemplate('adminGenre/addGenreForm.php');
        View::set('content',$content);
    }
    
    public function actionAddGenre(){
        if(!empty($_POST['type_of_genre'])){
            $genre = new ModelGenre();
            $result = $genre->addGenre($_POST);
        
            if($result === true){
                $message = View::renderSuccessMessage('add genre!');
            }else{
                $message = View::renderErrorMessage('genre not add!');
            }
            View::set('message', $message);
            $this->allGenres();
        }else{
            $message = View::renderErrorMessage('Field Type_of_genre is required');
            View::set('message', $message);
            $this->actionAddGenreForm();
        }
    }
    
    public function actionDelGenre(){
        if(isset($_GET['id'])){
            $idgenre = $_GET['id'];
            
            $genre = new ModelGenre();
            $result = $genre->delGenre($idgenre);
            
            if($result === true){
                $massage = View::renderSuccessMessage('genre delete!');
            }else{
                $massage = View::renderErrorMessage('genre is not delete!');
            }
        }else{
            $massage = View::renderErrorMessage('is not genre!');
        }
        View::set('message',$massage);
        $this->allGenres();
    }
        
    public function actionUpdateGenreForm(){
        if (!empty($_GET['id'])) {
            View::set('title','Edit Genre Form'); 
            $genre = new ModelGenre();
            $genreInfo = $genre->getDataById($_GET['id']);
            $content = View::renderTemplate('adminGenre/updateGenreForm.php', $genreInfo);    
            View::set('content',$content);
        } else {
            $message = View::renderErrorMessage('not genre!');
            View::set('message', $message);
            $this->allgenres();
        }
    }    
        
    public function actionUpdateGenre(){
        if (!empty($_POST['type_of_genre']) 
                && !empty($_POST['id'])){
            $genre = new ModelGenre();
            $result = $genre->updateGenre($_POST);
            
            if ($result === true) {
                $message = View::renderSuccessMessage('genre update!');
            } else {
                $message = View::renderErrorMessage('genre is not update!');
            }
            View::set('message', $message);
            $this->allGenres();
        } else {
            $message = View::renderErrorMessage('All fields are required');
            View::set('message', $message);
            $this->actionEditGenreForm();
        }
    }
}