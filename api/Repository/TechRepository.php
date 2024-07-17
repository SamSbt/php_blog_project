<?php

namespace Repository;

use PDO;

class TechRepository extends BaseRepository
{
  public function getArticles($id)
  {
    $sql = "SELECT * FROM article WHERE id_article IN (SELECT id_article FROM article_tech WHERE id_tech = $id)" ;
    $queryResponse = $this->preparedQuery($sql);
    $articles = $queryResponse->statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Entities\Article");
    return $articles;
  }
}
