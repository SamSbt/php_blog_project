<?php

namespace Entities;

class BaseEntity
{
  function __construct($fields = [])
  {
    foreach ($fields as $key => $value) {
      if (property_exists($this, $key))
        $this->$key = $value;
    }
  }
}
