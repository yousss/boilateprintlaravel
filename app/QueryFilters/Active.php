<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;


class Active extends Filtering
{

  protected function applyFilter(Builder $builder)
  {
    return $builder->where($this->filterName(), request($this->filterName()));
  }
}
