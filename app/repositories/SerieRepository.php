<?php

namespace Repositories;

use Entities\Serie;
use PDO;

class SerieRepository extends BaseRepository
{
  public function getAll()
  {
    $queryResponse = $this->preparedQuery("SELECT * FROM serie");
    $series = $queryResponse->statement->fetchAll(PDO::FETCH_CLASS, "Entities\Serie");
    return $series;
  }

  public function getOneById($id)
  {
    $queryResponse = $this->preparedQuery("SELECT * FROM serie WHERE id_serie = ?", [$id]);
    $serie = new Serie($queryResponse->statement->fetch(PDO::FETCH_ASSOC));
    return $serie;
  }
}
