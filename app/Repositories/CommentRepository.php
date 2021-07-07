<?php

namespace App\Repositories;

use App\Interfaces\CommentInterface;
use App\Models\Comment;
use App\Repositories\BaseRepository;

class CommentRepository extends BaseRepository implements CommentInterface
{

    public function __construct(Comment $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }
    
}
