<?php

// fonction pour autoload BaseController dans ses classes filles
function autoload($className){
  $classFilePath = lcfirst("$className.php");
  if(file_exists($classFilePath)){
    require_once $classFilePath;
  }
}
spl_autoload_register("autoload");

// import plus nécessaire ici car func autoload faite
// include_once "controllers/Router.php";
$router = new Controllers\Router();
// méthode responsable de l'exécution de l’action du contrôleur
$router->start();
