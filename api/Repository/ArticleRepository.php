<?php

namespace Repository;

use PDO;

class ArticleRepository extends BaseRepository
{
  public function getLastPublishedArticles($qty)
  {
    $sql = "SELECT * FROM article ORDER BY published_at DESC LIMIT $qty;";
    $queryResponse = $this->preparedQuery($sql);
    $articles = $queryResponse->statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Entity\Article');
    var_dump($articles);
    return $articles;
    
  }
}
