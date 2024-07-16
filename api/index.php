<?php

use Core\HttpRequest;
use Core\HttpResponse;

function autoload($className)
{
  $classFilePath = "$className.php";
  if (file_exists($classFilePath)) {
    require_once $classFilePath;
  }
}
spl_autoload_register("autoload");

// HttpResponse::SendOK("ok");

$httpRequest = new HttpRequest();

// echo "Method: " . $request['method'] . "<br>";
// echo "Route: " . implode('/', $request['route']) . "<br>";
// echo "Params: " . json_encode($request['params']) . "<br>";
// echo "Body: " . json_encode($request['body']) . "<br>";+