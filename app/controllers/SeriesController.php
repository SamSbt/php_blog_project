<?php

namespace Controllers;

use Core\HttpResponse;
use Repositories\SerieRepository;

class SeriesController extends BaseController
{
  public function index()
  {
    $serieRepository = new SerieRepository();
    $series = $serieRepository->getAll();
    $seriesArray = [];

    foreach ($series as $serie) {
      $seriesArray[] = [
        "id_serie" => $serie->id_serie,
        "img_src" => $serie->img_src,
        "title" => $serie->title,
        "summary" => $serie->summary,
      ];
    }

    $attributes = [
      'series' => $seriesArray,
      'pageTitle' => "MyBlog - Les Séries",
    ];
    $this->render($attributes);
  }

  public function articles()
  {
    // Vérifier si ID non défini / si n'est pas un nombre / si inférieur à 1 : renvoi sur func 404
    if (!isset($this->params[0]) || !is_numeric($this->params[0]) || (int)$this->params[0] < 1) {
      HttpResponse::SendNotFound();
    }

    $id = (int)$this->params[0];

    // Récupérer la série par ID
    $serieRepository = new SerieRepository();
    $serie = $serieRepository->getOneById($id);
    // var_dump($serie);
    $articles = $serieRepository->getArticles($id);

    // Si la série n'existe pas, rediriger vers la page 404
    HttpResponse::SendNotFound($serie == null);

    $attributes = [
      'serie' => $serie,
      'articles' => $articles,
      'pageTitle' => "MyBlog - Série : " . $serie->title,
    ];
    $this->render($attributes);
  }
}
