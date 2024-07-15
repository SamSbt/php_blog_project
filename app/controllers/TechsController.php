<?php

namespace Controllers;

use Core\HttpResponse;
use Repositories\TechRepository;

class TechsController extends BaseController
{
  public function index()
  {
    $techRepository = new TechRepository();
    $techs = $techRepository->getAll();

    $techsArray = [];

    foreach ($techs as $tech) {
      $techsArray[] = [
        "id_tech" => $tech->id_tech,
        "img_src" => $tech->img_src,
        "label" => $tech->label,
      ];
    }

    $attributes = [
      'techs' => $techsArray,
      'pageTitle' => "MyBlog - Techs",
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

    // Récupérer l'article par ID
    $techRepository = new TechRepository();
    $tech = $techRepository->getOneById($id);
    // var_dump($tech);
    $articles = $techRepository->getArticles($id);

    // Si l'article n'existe pas, rediriger vers la page 404
    HttpResponse::SendNotFound($tech == null);

    $attributes = [
      'tech' => $tech,
      'articles' => $articles,
      'pageTitle' => "MyBlog - Techs : " . $tech->title,
    ];
    $this->render($attributes);
  }
}
