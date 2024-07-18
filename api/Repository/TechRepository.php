<?php

namespace Repository;

use Core\HttpReqAttr;
use Core\HttpRequest;
use Entity\Tech;
use PDO;

class TechRepository extends BaseRepository
{
  public function getArticles($id)
  {
    $sql = "SELECT * FROM article WHERE id_article IN (SELECT id_article FROM article_tech WHERE id_tech = $id)" ;
    $queryResponse = $this->preparedQuery($sql);
    $articles = $queryResponse->statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Entity\Article");
    return $articles;
  }
  // public function insert(): Tech | bool
  // {
  //   $requestBody = HttpRequest::get(HttpReqAttr::BODY);
  //   $tech = new Tech($requestBody);
  //   $tech->id_tech = null;
  //   $entityArray = get_object_vars($tech);
  //   $columns = implode(',', array_keys($entityArray));
  //   $values = implode(',', array_map(function () {
  //     return "?";
  //   }, $entityArray));
  //   $params = array_values($entityArray);
  //   $sql = "INSERT INTO tech ($columns) VALUES ($values)";
  //   $queryResponse = $this->preparedQuery($sql, $params);
  //   if ($queryResponse->result && $queryResponse->statement->rowCount() == 1) {
  //     $lastInsertId = self::$connection->lastInsertId();
  //     $tech = $this->getOneById($lastInsertId);
  //     return $tech;
  //   }
  //   return false;
  // }
}
