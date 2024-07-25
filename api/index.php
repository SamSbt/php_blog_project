<?php

use Controller\Router;

$origin = "http://localhost:5173";
header("Access-Control-Allow-Origin: $origin"); 
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