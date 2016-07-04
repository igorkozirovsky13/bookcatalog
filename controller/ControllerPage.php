<?php
    abstract class ControllerPage{
        
        public function __construct() {
           $this->setMainTemplate();
           $this->setHeader();
           $this->setFooter();
           $this->setSidebar();
        }
        
        public function setMainTemplate(){
            View::setMainTemplate('index.php');
        }

        public function setHeader(){
            $header = View::renderTemplate('header.php',array());
            View::set('header',$header);
        }
        
        public function setFooter(){
            $footer = View::renderTemplate('footer.php',array());
            View::set('footer',$footer);
        }
        
        public function setSidebar(){
            $sidebar = View::renderTemplate('sidebar.php',array());
            View::set('sidebar', $sidebar);
        }
    }