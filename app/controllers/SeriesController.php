<?php

namespace Controllers;

use Repositories\SerieRepository;

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
    $id = (int)$this->params[0];
    if ($id < 1) {
      header('HTTP/1.0 404 Not Found');
      die();
    }
    // echo "<br/>Executing " . get_called_class() . " -> " . __FUNCTION__ . "() with id=" . $id . "<br />";
    $serieRepository = new SerieRepository();
    $serie = $serieRepository->getOneById($id);
    // var_dump($serie);
    $attributes = [
      'serie' => $serie,
      'pageTitle' => "MyBlog - Séries : " . $serie->title,
    ];
    $this->render($attributes);
  }
}
