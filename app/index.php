<?php

// fonction pour autoload BaseController dans ses classes filles
function autoload($className){
  $classFilePath = lcfirst("$className.php");
  if(file_exists($classFilePath)){
    require_once $classFilePath;
  }
}
spl_autoload_register("autoload");

// routes dans Router.php
// $route = filter_var(trim($_SERVER["REQUEST_URI"], '/'), FILTER_SANITIZE_URL);
// $routeParts = explode('/', $route);
// $controllerName = ucfirst(array_shift($routeParts));
// if (empty($controllerName)) {
//   $controllerName = "Home";
// }
// echo "Controller Name : $controllerName<br/>";
// $actionName = array_shift($routeParts) ?? "index";
// echo "Action Name: $actionName<br/>";
// $params = $routeParts;
// echo "Params : ";
// var_dump($params);

// import plus nécessaire ici car func autoload faite
// include_once "controllers/Router.php";
$router = new Controllers\Router();
// méthode responsable de l'exécution de l’action du contrôleur
$router->start();
