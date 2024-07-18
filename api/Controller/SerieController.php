<?php

namespace Controller;

use Core\HttpResponse;
use Entity\Serie;
use Repository\SerieRepository;

class SerieController extends BaseController
{
  public function get(): array | Serie | null
  {
    $serieRepository = new SerieRepository();
    if ($this->id <= 0) {
      $series = $serieRepository->getAll();
      return $series;
    }
    $serie = $serieRepository->getOneById($this->id);
    return $serie;
  }
  public function post(): array
  {
    $serieRepository = new SerieRepository();
    $insertedSerie = $serieRepository->insert();
    return ["result" => $insertedSerie];
  }
  // public function put(): array
  // {
  //   HttpResponse::SendNotFound($this->id <= 0);
  //   return ["result" => "Update Article with id = " . $this->id];
  // }
  // public function delete(): array
  // {
  //   HttpResponse::SendNotFound($this->id <= 0);
  //   return ["result" => "Delete Article with id = " . $this->id];
  // }
}
