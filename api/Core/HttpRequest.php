<?php

namespace Core;

class HttpRequest
{
  private static $instance = null;

  private $method = "";
  private $route = [];
  private $params = [];
  private $body = [];

  private function __construct()
  {
    $this->method = $_SERVER['REQUEST_METHOD'];
    $parsed_url = parse_url(filter_var(trim($_SERVER['REQUEST_URI'], "/")));
    $this->route = explode('/', $parsed_url['path']);
    parse_str($parsed_url['query'] ?? "", $this->params);
    $this->body = filter_var_array(json_decode(file_get_contents('php://input'), true) ?? [], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  // var_dump($this);
  }

  public static function get(HttpReqAttr $option = HttpReqAttr::INSTANCE) : string | array | HttpRequest
  {
    if (is_null(self::$instance)) {
      self::$instance = new HttpRequest();
    }
    if($option == HttpReqAttr::INSTANCE){
      return self::$instance;
    }
    return self::$instance->{$option->value};
  }
}

// enum permet d'éviter de créer 5 méthodes get
enum HttpReqAttr: string
{
case INSTANCE = "instance";
case METHOD = "method";
case ROUTE = "route";
case PARAMS = "params";
case BODY = "body";
}