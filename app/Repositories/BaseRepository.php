<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Interfaces\BaseRepositoryInterface;
use App\Traits\ResponseAPI;
use Exception;

class BaseRepository implements BaseRepositoryInterface {

  use ResponseAPI;

  private $model;

  public function __construct(Model $model)
  {
    $this->model = $model;
  }

  public function create(array  $attributes)
  {
    try {
      $model = $this->model->create($attributes);
      return $this->success( "Model created", $model, 201);
    } catch(Exception $e) {
      return $this->error($e->getMessage(), $e->getCode());
    }
  }

  public  function update(array $attributes, $id)
  {
    try {
      $model = $this->model->where("id", $id)->update($attributes);
      return $this->success( "Model updated", $model);
    } catch(Exception $e) {
      return $this->error($e->getMessage(), $e->getCode());
    }
  }

  public function delete($id)
  {
    try {
      $model = $this->find($id);
      $model->delete();
      return $this->success("Model deleted", $model);
    } catch(Exception $e) {
      return $this->error($e->getMessage(), $e->getCode());
    }
  }

  public function find($id)
  {
    try {
      $user = $this->model->find($id); 
      return $this->success("User Detail", $user);
    } catch (Exception $e) {
      return $this->error($e->getMessage(), $e->getCode());
    }
  }

  public function findInIds(array $ids)
  {
    try {
      $models = $this->model->find($ids); 
      return $this->success("Detail of model", $models);
    } catch (Exception $e) {
      return $this->error($e->getMessage(), $e->getCode());
    }
  }

  public function all()
  {
    try {
      $users = $this->model->all();
      return $this->success("all models", $users);
    } catch (Exception $e) {
      return $this->error($e->getMessage(), $e->getCode());
    }
  }
}