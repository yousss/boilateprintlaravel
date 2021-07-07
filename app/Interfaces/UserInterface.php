<?php

namespace App\Interfaces;

use App\Interfaces\BaseRepositoryInterface;

interface UserInterface extends BaseRepositoryInterface
{

  public function updateUserProfile ( array $profiles, int $id);

}