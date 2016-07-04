<?php
    abstract class ControllerAdminPage extends ControllerPage{
        
        public function setSidebar(){
            $sidebar = View::renderTemplate('adminSidebar.php');
            View::set('sidebar',$sidebar);
        }
    }