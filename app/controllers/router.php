<?php

namespace Controllers;

class Router
{
  public function __construct()
  {
    $route = filter_var(trim($_SERVER["REQUEST_URI"], '/'), FILTER_SANITIZE_URL);
    $routeParts = explode('/', $route);
    $controllerName = ucfirst(array_shift($routeParts));
    if (empty($controllerName)) {
      $controllerName = "Home";
    }
  }
}
