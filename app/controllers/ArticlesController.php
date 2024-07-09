<?php

namespace Controllers;
use Repositories\ArticleRepository;

class ArticlesController extends BaseController
{
    public function details()
    {
        // Vérifier si un ID est fourni dans les paramètres
        if (!isset($this->params[0]) || !is_numeric($this->params[0]) || (int)$this->params[0] < 1) {
            $this->redirect404();
        }

        $id = (int)$this->params[0];

        // echo "<br/>Executing " . get_called_class() . " -> " . __FUNCTION__ . "() with id=" . $id ."<br />";

        // Récupérer l'article par ID
        $articleRepository = new ArticleRepository();
        $article = $articleRepository->getOneById($id);
        // var_dump($article); 

        // Si l'article n'existe pas, rediriger vers la page 404
        if (!$article) {
            $this->redirect404();
        }

        $attributes = [
            'article' => $article,
            'pageTitle' => "MyBlog - Article : ". $article->title,
        ];
        $this->render($attributes);
    }

    private function redirect404()
    {
        header('HTTP/1.0 404 Not Found');
        include_once ('views/pages/error.404.php');
        die();
    }
}
