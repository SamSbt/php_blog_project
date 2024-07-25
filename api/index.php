<?php

use Controller\Router;

header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); 
header("Access-Control-Allow-Headers: Content-Type, Authorization");

function autoload($className)
{
  $classFilePath = "$className.php";
  if (file_exists($classFilePath)) {
    require_once $classFilePath;
  }
}
spl_autoload_register("autoload");

$router = new Router();
$router->start();