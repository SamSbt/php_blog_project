<?php

namespace Controller;

use Core\HttpResponse;

class BaseController
{
  private string $method;
  protected int $id;
  public function __construct($method, $id)
  {
    $this->method = $method;
    $methodNotExists = !method_exists(get_called_class(), $this->method);
    HttpResponse::SendNotFound($methodNotExists);
    $this->id = $id;
  }
  public function execute(): void
  {
    $result = $this->{$this->method}();
    var_dump($result);
  }
}
