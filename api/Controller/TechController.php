<?php

namespace Controller;

use Core\HttpResponse;
use Entity\Tech;
use Repository\TechRepository;

class TechController extends BaseController
{
  // public function get(): array | Tech | null
  // {
  //   $techRepository = new TechRepository();
  //   if ($this->id <= 0) {
  //     $techs = $techRepository->getAll();
  //     return $techs;
  //   }
  //   $tech = $techRepository->getOneById($this->id);
  //   return $tech;
  // }
  // public function post(): array
  // {
  //   $techRepository = new TechRepository();
  //   $insertedTech = $techRepository->insert();
  //   return ["result" => $insertedTech];
  // }
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
