<?php

namespace Entities;

class Serie
{
  public int $id_serie;
  public ?string $title;
  public ?string $summary;
  public ?string $img_src;
  public ?bool $is_deleted;

  function __construct($fields = [])
  {
    foreach ($fields as $key => $value) {
      if (property_exists($this, $key))
        $this->$key = $value;
    }
  }
}