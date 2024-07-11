<?php

namespace Entities;

class Serie extends BaseEntity
{
  public int $id_serie;
  public ?string $title;
  public ?string $summary;
  public ?string $img_src;
  public ?bool $is_deleted;
}
