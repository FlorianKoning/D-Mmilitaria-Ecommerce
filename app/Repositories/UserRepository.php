<?php

namespace App\Repositories;

use Exception;
use App\Models\User;
use App\Interfaces\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function find($id): User
    {
        $user = User::find($id);

        if (!$user) {
            throw new Exception("There is no user with that id/key!");
        }

        return $user;
    }
}
