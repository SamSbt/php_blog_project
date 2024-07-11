<?php

namespace Controllers;

use Core\HttpResponse;
use Repositories\ArticleRepository;



class ArticlesController extends BaseController
{
    public function details()
    {
        // Vérifier si ID non défini / si n'est pas un nombre / si inférieur à 1 : renvoi sur func 404
        if (!isset($this->params[0]) || !is_numeric($this->params[0]) || (int)$this->params[0] < 1) {
            HttpResponse::SendNotFound();
        }

        $id = (int)$this->params[0];

        // Récupérer l'article par ID
        $articleRepository = new ArticleRepository();
        $article = $articleRepository->getOneById($id);
        // var_dump($article); 

        // Si l'article n'existe pas, rediriger vers la page 404
        HttpResponse::SendNotFound($article == null);

        $attributes = [
            'article' => $article,
            'pageTitle' => "MyBlog - Article : ". $article->title,
        ];
        $this->render($attributes);
    }
}
