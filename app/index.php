<?php 
  $route = filter_var(trim($_SERVER["REQUEST_URI"], '/'), FILTER_SANITIZE_URL);
  $routeParts = explode('/', $route);
  $controllerName = ucfirst(array_shift($routeParts));
  if(empty($controllerName)){
    $controllerName = "Home";
  }
  echo "Controller Name : $controllerName<br />";
  $actionName = array_shift($routeParts) ?? "index";
  echo "Action Name : $actionName<br />";
  $params = $routeParts;
  echo "Params : ";
  var_dump($params);