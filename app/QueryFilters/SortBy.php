<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class SortBy extends Filtering
{

  protected function applyFilter(Builder $builder)
  {
    return $builder->orderBy("name", request($this->filterName()));
  }
}
