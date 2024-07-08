<?php

namespace Entities;

class Tech
{
  public int $id_tech;
  public ?string $label;
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
