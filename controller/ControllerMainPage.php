<?php
    abstract class ControllerMainPage extends ControllerPage{
       
       public function setSidebar(){
            $sidebar = View::renderTemplate('mainSidebar.php');
            View::set('sidebar', $sidebar);
        }
    }
        
        