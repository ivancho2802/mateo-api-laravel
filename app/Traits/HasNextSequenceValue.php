<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait HasNextSequenceValue
{

  public static function getNextSequenceValue()
  {
    $self = new static();

    if (!$self->getIncrementing()) {
      throw new \Exception(sprintf('Model (%s) is not auto-incremented', static::class));
    }

    $sequenceName = "{$self->getTable()}_id_seq";

    return DB::selectOne("SELECT nextval('{$sequenceName}') AS val")->val;
  }
}
