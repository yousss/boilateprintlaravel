<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\User;
use App\Repositories\BaseRepository;
use Exception;

class UserRepository extends BaseRepository implements UserInterface
{

    public function __construct(User $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }

    public function updateUserProfile(array $profiles, int $id)
    {
       $user =  $this->find($id);
       $user->profile->update($profiles);
       $user->save();
    }

    public function all () {
        try {
            $users  = $this->model->allUsers();
            return $this->success("all users filtered", $users);
        } catch (Exception $e) {
            return $this->error("Something went wrong", $e->getCode());
        }
    }
    
}
