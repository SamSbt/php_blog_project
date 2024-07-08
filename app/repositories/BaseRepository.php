<?php

namespace Repositories;

use PDO;
use PDOException;

class BaseRepository
{
  private static $connection = null;
  private function connect()
  {
    if (self::$connection == null) {
      include_once "./configs/db.config.php";
      $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME;
      $user = DB_USER;
      $pass = DB_PASSWORD;

      // débogage du code suite à des erreurs de frappe
      try {
        $connection = new PDO(
          $dsn,
          $user,
          $pass,
          array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
          )
        );
      } catch (PDOException $e) {
        $errorMessage = $e->getMessage();
        die("Erreur de connexion à la base de données : $errorMessage");
      }
      self::$connection = $connection;
    }
    return self::$connection;
  }
  protected function preparedQuery($sql, $params = []){
    $statement = $this->connect()->prepare($sql);
    $result = $statement->execute($params);
    return (object)['result' => $result, 'statement' => $statement];
  }
}
