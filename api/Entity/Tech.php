<?php

namespace Entity;

class Tech extends BaseEntity
{
  public int $id_tech;
  public ?string $label;
  public ?string $img_src;
  public ?bool $is_deleted;
}
