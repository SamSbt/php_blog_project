<?php

namespace Controller;

use Core\HttpRequest;
use Core\HttpReqAttr;
use Core\HttpResponse;

class Router
{
  private BaseController $controllerInstance;
  public function __construct()
  {
    $table = HttpRequest::get(HttpReqAttr::ROUTE)[0];
    $controllerClassName = "Controller\\" . ucfirst(empty($table) ? "Home" : $table) . "Controller";
    $controllerFilePath = "$controllerClassName.php";
    HttpResponse::SendNotFound(!file_exists($controllerFilePath));
    $method = strtolower(HttpRequest::get(HttpReqAttr::METHOD));
    $id = intval(HttpRequest::get(HttpReqAttr::ROUTE)[1] ?? 0);
    $this->controllerInstance = new $controllerClassName($method, $id);
  }
  public function start(): void
  {
    HttpResponse::SendOK($this->controllerInstance->execute());
  }
}
