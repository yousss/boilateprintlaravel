<?php

namespace App\Repositories;

use App\Interfaces\ProfileInterface;
use App\Profile;
use App\Repositories\BaseRepository;

class ProfileRepository extends BaseRepository implements ProfileInterface
{

    public function __construct(Profile $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }
    
}
