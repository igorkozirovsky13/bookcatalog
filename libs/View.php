<?php
class View {
    static $mainTemplate;
    static $vars = array();
    static $viewFolder = 'view';
    
    static function setMainTemplate($filename) {
        self::$mainTemplate = $filename;
    }
    
    static function renderTemplate($filename, $data=array()) {
        ob_start();
            include(self::$viewFolder . '/' . $filename);
        $result = ob_get_contents();
        ob_get_clean();
        return $result;
    }
    
    static function set($varName, $content) {
        self::$vars[$varName] = $content;
    }
    
    static function render() {
        ob_start();
            $vars = self::$vars;
            include(self::$viewFolder . '/' . self::$mainTemplate);
        $result = ob_get_contents();
        ob_get_clean();
        return $result;
    }
    
    static function renderSuccessMessage($message) {
        return self::renderTemplate('message.php', array(
            'message' => $message,
            'color' => 'green'
        ));
    }
    
    static function renderErrorMessage($message) {
        return self::renderTemplate('message.php', array(
            'message' => $message,
            'color' => 'red'
        ));
    }

}