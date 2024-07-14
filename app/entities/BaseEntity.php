<?php

namespace Entities;

class BaseEntity
{
  function __construct($fields = [])
  {
    $pk = "id_" . lcfirst(str_replace("Entities\\", "", get_called_class()));
    $this->{$pk} = 0;
    foreach ($fields as $key => $value) {
      if (property_exists($this, $key))
        $this->$key = $value;
    }
  }
}
