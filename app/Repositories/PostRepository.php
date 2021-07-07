<?php

namespace App\Repositories;

use App\Interfaces\PostInterface;
use App\Post;
use App\Repositories\BaseRepository;

class PostRepository extends BaseRepository implements PostInterface
{

    public function __construct(Post $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }
    
}
