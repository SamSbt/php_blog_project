<?php

namespace Controllers;

class Router
{
  private $controllerInstance;
  public function __construct()
  {
    $route = filter_var(trim($_SERVER["REQUEST_URI"], '/'), FILTER_SANITIZE_URL);
    $routeParts = explode('/', $route);
    $controllerName = ucfirst(array_shift($routeParts));
    if (empty($controllerName)) {
      $controllerName = "Home";
    }
    $controllerClassName = "Controllers\\" . $controllerName . "Controller";
    $ControllerFilePath = lcfirst($controllerClassName) . ".php";
    if (!file_exists($ControllerFilePath)) {
      header('HTTP/1.0 404 Not found');
      die();
    }
    

    // suppression car func autoload mnt
    // include_once $ControllerFilePath;
    $this->controllerInstance = new $controllerClassName($routeParts);
    // $controllerInstance->{$controllerInstance->actionName}();
  }

  public function start()
  {
    $action = $this->controllerInstance->actionName;
    $this->controllerInstance->{$action}();
  }
}
