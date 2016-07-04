<?php
class Router {
    protected $request;
    protected $indexController = 'index';
    protected $indexAction = 'index';

    public function __construct($request = false){
        $this->request = $request;
    }

    public function setIndexController($indexController){
        $this->indexController = $indexController;
    }

    public function setIndexAction($indexAction){
        $this->indexAction = $indexAction;
    }

    public function getController(){
        if (isset($this->request['page']) && !empty($this->request['page'])) {
            return $this->request['page'];
        }
        return $this->indexController;
    }

    public function getAction(){
        if (isset($this->request['action']) && !empty($this->request['action'])) {
            return $this->request['action'];
        }
        return $this->indexAction;
    }
}