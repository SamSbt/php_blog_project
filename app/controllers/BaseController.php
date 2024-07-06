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
}
