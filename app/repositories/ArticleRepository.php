<?php namespace Repositories;

use PDO;

class ArticleRepository extends BaseRepository 
{
  // public function getAll(){
  //   $queryResponse = $this->preparedQuery("SELECT * FROM article");
  //   $articles = $queryResponse->statement->fetchAll(PDO::FETCH_CLASS, "Entities\Article");
  //   return $articles;
  // }

  public function getLastPublishedArticles($qty){
    $sql = "SELECT * FROM article ORDER BY published_at DESC LIMIT $qty;";
    $queryResponse = $this->preparedQuery($sql);
    $articles = $queryResponse->statement->fetchAll(PDO::FETCH_CLASS, 'Entities\Article');
    return $articles;
  }

//   public function getOneById($id){
//     $queryResponse = $this->preparedQuery("SELECT * FROM article WHERE id_article = ?", [$id]);
//     $data = $queryResponse->statement->fetch(PDO::FETCH_ASSOC);
//     if ($data) {
//       return new Article($data);
//     } else {
//       return null; // ou false
//     }
//   }
}