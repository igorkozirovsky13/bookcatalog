<?php
class ControllerAdminAuthor extends ControllerAdminPage{
    
    public function actionIndex(){
        $this->allAuthors();
    }
    
    public function allAuthors(){
        View::set('title','Author list');
        $author = new ModelAuthor();
        $result = $author->allAuthors();
        if($result){
            $content = View::renderTemplate('adminAuthor/allAuthors.php',$result);    
            View::set('content',$content);
        }
    }
    
    public function actionAddAuthorForm(){
        View::set('title','Author Form');
        $content = View::renderTemplate('adminAuthor/addAuthorForm.php');    
        View::set('content',$content);
    }
    
    public function actionUpdateAuthorForm(){
        if (!empty($_GET['id'])) {
            View::set('title','Edit Author Form'); 
            $author = new ModelAuthor();
            $authorInfo = $author->getDataById($_GET['id']);
            $content = View::renderTemplate('adminAuthor/updateAuthorForm.php', $authorInfo);    
            View::set('content',$content);
        } else {
            $message = View::renderErrorMessage('not author!');
            View::set('message', $message);
            $this->allAuthors();
        }
    }
    
    public function actionDelAuthor(){
        if(isset($_GET['id'])){
            $idauthor = $_GET['id'];
            $author = new ModelAuthor();
            $result = $author->delAuthor($idauthor);
        
            if ($result === true){
                $message = View::renderSuccessMessage('author delete!');
            } else {
                $message = View::renderErrorMessage('author is not delete!');
            }
        } else {
            $message = View::renderErrorMessage('not author!');
        }
        View::set('message', $message);
        $this->allAuthors();
    }
    
    public function actionAddAuthor(){
        if (!empty($_POST['name']) & !empty($_POST['sername'])){
            $author = new ModelAuthor();
            $result = $author->addAuthor($_POST);
            
            if ($result === true) {
                $message = View::renderSuccessMessage('author added!');
            } else {
                $message = View::renderErrorMessage('author is not added!');
            }
            View::set('message', $message);
            $this->allAuthors();
        } else {
            $message = View::renderErrorMessage('Field Name is required');
            View::set('message', $message);
            $this->actionAddAuthorForm();
        }
    }
    
    public function actionUpdateAuthor(){
        if (!empty($_POST['name']) 
                && !empty($_POST['sername'])
                && !empty($_POST['id'])){
            $author = new ModelAuthor();
            $result = $author->updateAuthor($_POST);
            
            if ($result === true) {
                $message = View::renderSuccessMessage('author update!');
            } else {
                $message = View::renderErrorMessage('author is not update!');
            }
            View::set('message', $message);
            $this->allAuthors();
        } else {
            $message = View::renderErrorMessage('All fields are required');
            View::set('message', $message);
            $this->actionEditAuthorForm();
        }
    }
}