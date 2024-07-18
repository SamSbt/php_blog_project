<?php

namespace Repository;

use Core\HttpReqAttr;
use Core\HttpRequest;
use Entity\Serie;
use PDO;

class SerieRepository extends BaseRepository
{
  public function getArticles($id)
  {
    $sql = "SELECT * FROM article WHERE id_serie = $id";
    $queryResponse = $this->preparedQuery($sql);
    $articles = $queryResponse->statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Entity\Article");
    return $articles;
  }
  // public function insert(): Serie | bool
  // {
  //   $requestBody = HttpRequest::get(HttpReqAttr::BODY);
  //   $serie = new Serie($requestBody);
  //   $serie->id_serie = null;
  //   $entityArray = get_object_vars($serie);
  //   $columns = implode(',', array_keys($entityArray));
  //   $values = implode(',', array_map(function () {
  //     return "?";
  //   }, $entityArray));
  //   $params = array_values($entityArray);
  //   $sql = "INSERT INTO serie ($columns) VALUES ($values)";
  //   $queryResponse = $this->preparedQuery($sql, $params);
  //   if ($queryResponse->result && $queryResponse->statement->rowCount() == 1) {
  //     $lastInsertId = self::$connection->lastInsertId();
  //     $serie = $this->getOneById($lastInsertId);
  //     return $serie;
  //   }
  //   return false;
  // }
}
