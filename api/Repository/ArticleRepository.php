<?php

namespace Repository;

use Core\HttpReqAttr;
use Core\HttpRequest;
use Entity\Article;
use PDO;

class ArticleRepository extends BaseRepository
{
  public function getLastPublishedArticles($qty)
  {
    $sql = "SELECT * FROM article ORDER BY published_at DESC LIMIT $qty;";
    $queryResponse = $this->preparedQuery($sql);
    $articles = $queryResponse->statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Entity\Article');
    return $articles;
  }
// public function insert() : Article | bool
// {
// $requestBody = HttpRequest::get(HttpReqAttr::BODY);
// $article = new Article($requestBody);
// $article->id_article = null;
// $entityArray = get_object_vars($article);
// $columns = implode(',', array_keys($entityArray));
// $values = implode(',', array_map(function () { return "?";} , $entityArray));
// $params = array_values($entityArray);
// $sql = "INSERT INTO article ($columns) VALUES ($values)";
// $queryResponse = $this->preparedQuery($sql, $params);
// if($queryResponse->result && $queryResponse->statement->rowCount() == 1){
//   $lastInsertId = self::$connection->lastInsertId();
//   $article = $this->getOneById($lastInsertId);
//   return $article;
// }
// return false;
// }
}

// FETCH_PROPS_LATE permet que constructeur soit exécuté avant affectation des valeurs en DB