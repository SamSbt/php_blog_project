<?php namespace Entities;

class Article 
{
public int $id_article;
public ?string $title;
public ?string $summary;
public ?string $img_src;
public ?string $published_at;
public ?string $updated_at;
public ?bool $is_deleted;
public int $id_appuser;
public ?int $id_serie;

function __construct($fields = []){
  foreach($fields as $key => $value){
    if(property_exists($this, $key))
    $this->$key = $value;
  }
}

}