<?php
namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
   /**
    * @param array $attributes
    * @return Model
    */
   public function create(array $attributes);

   /**
    * @param int $id
    * @return Model
    */
   public function find(int $id);

   /**
    * @param array $ids
    * @return array Model
    */
   public function findInIds (array $ids);

  /**
    * @return Collection | []
    */
    public function all();

    /**
    * @param int $id
    * @param array $attributes
    * @return Model
    */
   public function update(array $attributes, int $id);
   
    /**
    * @param int $id
    * @return Model
    */
    public function delete(int $id);

}