<?php

namespace Controllers;

class BaseController
{
    public $actionName;
    protected $params;
    public function __construct($routeParts)
    {
        $this->actionName = array_shift($routeParts) ?? 'index';
        if (!method_exists(get_called_class(), $this->actionName)) {
            header('HTTP/1.0 404 Not Found');
            die();
        }
        $this->params = $routeParts;
    }

    // ajout de la méthode render
    protected function render($attributes = [], $viewPath = null){
        extract($attributes);
        if(!isset($viewPath)){
            $controllerName = str_replace("Controller", "", get_called_class());
            $controllerName = lcfirst(str_replace("s\\", "", $controllerName));
            $viewPath = "views/pages/$controllerName.$this->actionName.php";
        }
        require_once $viewPath;
    }
}
