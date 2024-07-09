<?php

namespace Controllers;

use Repositories\SerieRepository;

include_once '../utils/functions.php';

class SeriesController extends BaseController
{
  public function index()
  {
    // echo "<br />Executing " . get_called_class() . " -> " . __FUNCTION__ . "()";
    $serieRepository = new SerieRepository();
    $serie = $serieRepository;
    $attributes = [
      'serie' => $serie,
      'pageTitle' => "MyBlog - Séries",
    ];
    $this->render($attributes);
  }


  public function articles()
  {
    // Vérifier si ID non défini / si n'est pas un nombre / si inférieur à 1 : renvoi sur func 404
    if (!isset($this->params[0]) || !is_numeric($this->params[0]) || (int)$this->params[0] < 1) {
      redirect404();
    }

    $id = (int)$this->params[0];

    // echo "<br/>Executing " . get_called_class() . " -> " . __FUNCTION__ . "() with id=" . $id . "<br />";
    
    // Récupérer la série par ID
    $serieRepository = new SerieRepository();
    $serie = $serieRepository->getOneById($id);
    // var_dump($serie);

    // Si la série n'existe pas, rediriger vers la page 404
    if (!$serie) {
      redirect404();
    }

    $attributes = [
      'serie' => $serie,
      'pageTitle' => "MyBlog - Séries : " . $serie->title,
    ];
    $this->render($attributes);
  }
}
