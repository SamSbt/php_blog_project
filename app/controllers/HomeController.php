<?php namespace Controllers;

class HomeController
{
  public $actionName;
  public function __construct($routeParts)
  {
    $this->actionName = array_shift($routeParts) ?? 'index';
    if (!method_exists(get_called_class(), $this->actionName)){
      header('HTTP/1.0 404 Not found');
      die();
    }
  }

  public function index() {
    echo "<br />Executing " .get_called_class() . " -> " . __FUNCTION__ . "()";
  }

}