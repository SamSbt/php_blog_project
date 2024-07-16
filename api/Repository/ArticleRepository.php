<?php

namespace Repositories;

use PDO;

class ArticleRepository extends BaseRepository
{
  public function getLastPublishedArticles($qty)
  {
    $sql = "SELECT * FROM article ORDER BY published_at DESC LIMIT $qty;";
    $queryResponse = $this->preparedQuery($sql);
    $articles = $queryResponse->statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Entities\Article');
    return $articles;
  }
}

// FETCH_PROPS_LATE permet que constructeur soit exécuté avant affectation des valeurs en DB