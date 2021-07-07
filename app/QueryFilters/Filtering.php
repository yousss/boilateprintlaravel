<?php

namespace App\QueryFilters;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;


abstract class Filtering
{

  public function handle($request, Closure $next)
  {

    if (!request()->has($this->filterName())) {
      return $next($request);
    }

    $builder = $next($request);

    return $this->applyFilter($builder);
  }

  protected function filterName()
  {
    return Str::snake(class_basename($this));
  }

  protected abstract function applyFilter(Builder $builder);
}
