<?php

namespace Controllers;

class HomeController extends BaseController
{
  public function index()
  {
    echo "<br />Executing " . get_called_class() . " -> " . __FUNCTION__ . "()";
  }
}
