<?php

namespace Entity;

//attribut prédéfini
#[\AllowDynamicProperties]

class BaseEntity
{
  function __construct($fields = [])
  {
    $pk = "id_" . lcfirst(str_replace("Entity\\", "", get_called_class()));
    $this->{$pk} = 0;
    foreach ($fields as $key => $value) {
      if (property_exists($this, $key))
        $this->$key = $value;
    }
  }
}
