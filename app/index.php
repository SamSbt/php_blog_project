<?php 
  
  echo "Controller Name : $controllerName<br />";
  $actionName = array_shift($routeParts) ?? "index";
  echo "Action Name : $actionName<br />";
  $params = $routeParts;
  echo "Params : ";
  var_dump($params);