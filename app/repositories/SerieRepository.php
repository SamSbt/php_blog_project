<?php

namespace Repositories;


use PDO;

class SerieRepository extends BaseRepository
{
  public function getArticles($id)
  {
    $sql = "SELECT * FROM article WHERE id_serie = $id";
    $queryResponse = $this->preparedQuery($sql);
    $articles = $queryResponse->statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Entities\Article");
    return $articles;
  }
}
