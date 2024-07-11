<?php

namespace Repositories;

use Entities\Tech;
use PDO;

class TechRepository extends BaseRepository
{
  // public function getAll()
  // {
  //   $queryResponse = $this->preparedQuery("SELECT * FROM tech");
  //   $techs = $queryResponse->statement->fetchAll(PDO::FETCH_CLASS, "Entities\Serie");
  //   return $techs;
  // }

//   public function getOneById($id)
//   {
//     $queryResponse = $this->preparedQuery("SELECT * FROM tech WHERE id_tech = ?", [$id]);
//     $data = $queryResponse->statement->fetch(PDO::FETCH_ASSOC);
//     if ($data) {
//       return new Tech($data);
//     } else {
//       return null; // ou false
//     }
//   }
}
