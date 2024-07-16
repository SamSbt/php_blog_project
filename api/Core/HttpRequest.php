<?php

namespace Core;

class HttpRequest
{
  private static $instance = null;

  private $method = "";
  private $route = [];
  private $params = [];
  private $body = [];

  public function __construct()
  {
    $this->method = $_SERVER['REQUEST_METHOD'];
    // $this->parseRoute();
    // $this->parseParams();
    // $this->parseBody();
var_dump($this);
  }

  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new self();
    }
    // echo "coucou";
    return self::$instance;
  }

//   private function parseRoute()
//   {
//     $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//     $path = trim($path, '/');
//     $this->route = explode('/', $path);
//   }

//   private function parseParams()
//   {
//     $this->params = $_GET;
//   }

//   private function parseBody()
//   {
//     // Vérifie si la requête est un POST ou PUT avec un contenu JSON
//     if (in_array($this->method, ['POST', 'PUT', 'DELETE']) && $_SERVER['CONTENT_TYPE'] === 'application/json') {
//       $json = file_get_contents('php://input');
//       $this->body = json_decode($json, true);
//     } else {
//       $this->body = $_POST;
//     }
//   }

//   public function getMethod()
//   {
//     return $this->method;
//   }

//   public function getRoute()
//   {
//     return $this->route;
//   }

//   public function getParams()
//   {
//     return $this->params;
//   }

//   public function getBody()
//   {
//     return $this->body;
//   }

  public static function get()
  {
    self::getInstance();
    echo "get";
    return [
      // 'method' => $instance->getMethod(),
      // 'route' => $instance->getRoute(),
      // 'params' => $instance->getParams(),
      // 'body' => $instance->getBody()
    ];
  }
}
