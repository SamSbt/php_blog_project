<!-- fonction pour mener aux errors d'id -->
<?php
function redirect404()
{
  header('HTTP/1.0 404 Not Found');
  include_once __DIR__ . '/../views/pages/error.404.php';
  die();
}
