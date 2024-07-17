<?php

namespace Repository;

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
  protected function preparedQuery($sql, $params = [])
  {
    $statement = $this->connect()->prepare($sql);
    $result = $statement->execute($params);
    return (object)['result' => $result, 'statement' => $statement];
  }
  // récupérer valeurs table/entities ici
  private function getBaseClassName()
  {
    $baseClassName = str_replace("Repositories\\", "", get_called_class());
    return str_replace("Repository", "", $baseClassName);
  }
  private function getTableName()
  {
    return lcfirst($this->getBaseClassName());
  }
  private function getEntityClassName()
  {
    return "Entities\\" . $this->getBaseClassName();
  }
  public function getAll()
  {
    $queryResponse = $this->preparedQuery("SELECT * FROM " . $this->getTableName());
    $entities = $queryResponse->statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->getEntityClassName());
    return $entities;
  }
  public function getOneById($id)
  {
    $tableName = $this->getTableName();
    $entityClassName = $this->getEntityClassName();
    $queryResponse = $this->preparedQuery("SELECT * FROM $tableName WHERE id_$tableName = ?", [$id]);
    $assocArray = $queryResponse->statement->fetch(PDO::FETCH_ASSOC);
    if (!$assocArray) {
      return null;
    }
    $entity = new $entityClassName($assocArray);
    return $entity;
  }
}

// FETCH_PROPS_LATE permet que constructeur soit exécuté avant affectation des valeurs en DB