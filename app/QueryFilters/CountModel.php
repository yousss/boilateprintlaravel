<?php 
namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class CountModel extends Filtering {

  protected function applyFilter(Builder $builder) {
    return $builder->take(request($this->filterName()));
  }
}