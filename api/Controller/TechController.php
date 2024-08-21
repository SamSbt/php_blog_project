<?php

namespace Controller;

use Repository\TechRepository;

class TechController extends BaseController
{
  // // Cette méthode est spécifique pour obtenir la technologie avec les articles
  //   protected function get(): array
  //   {
  //       // Appel à la méthode parent pour obtenir les données de la technologie
  //       $tech = parent::get();

  //       // Récupération des articles associés
  //       if ($tech) {
  //           $techRepository = new TechRepository();
  //           $articles = $techRepository->getArticles($this->id);
  //           return [
  //               'tech' => $tech,
  //               'articles' => $articles
  //           ];
  //       }

  //       return ['tech' => null, 'articles' => []];
  //   }
}
