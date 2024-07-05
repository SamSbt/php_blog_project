<?php

namespace Controllers;

class SeriesController
{
  public $actionName;
  private $params;
  public function __construct($routeParts)
  {
    $this->actionName = array_shift($routeParts) ?? 'index';
    if (!method_exists(get_called_class(), $this->actionName)) {
      header('HTTP/1.0 404 Not found');
      die();
    }
    $this->params = $routeParts; 
  }

  public function index()
  {
    echo "<br />Executing " . get_called_class() . " -> " . __FUNCTION__ . "()";
  }

  public function articles()
  {
    $id = (int)$this->params[0];
    if ($id < 1) {
      header('HTTP/1.0 404 Not Found');
      die();
    }
    echo "<br/>Executing " . get_called_class() . " -> " . __FUNCTION__ . "() with id=" . $id;
  }
}
