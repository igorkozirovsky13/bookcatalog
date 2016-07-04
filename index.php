
<?php
require_once('./config.php');
require_once('./libs/autoloader.php');

$router = new Router($_GET);
$router->setIndexController('mainBook');
$controllerName = 'Controller' . ucfirst($router->getController());
$actionName = 'action' . ucfirst($router->getAction());

try {
    if (class_exists($controllerName)) {
        $controller = new $controllerName();
        if (method_exists($controller, $actionName)) {
            $controller->$actionName();
            print View::render();
        } else {
            throw new Exception("Method not found! <b>");
        }
    } else {
        throw new Exception("Controller not found! <b>");
    }
} catch (Exception $e) {
    echo   $e->getMessage(), "\n";
}