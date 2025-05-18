<?php

namespace App\Repositories;

use Exception;
use App\Models\User;
use App\Interfaces\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

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


    public function all(): Collection
    {
        $users = User::all();

        if (count($users) == 0) {
            throw new Exception("There where no users found in the database!");
        }

        return $users;
    }
}
