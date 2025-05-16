<?php

namespace App\Repositories;

use App\Interfaces\Repositories\GuestUserRepositoryInterface;
use Exception;
use App\Models\User;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\GuestUser;

class GuestUserRepository implements GuestUserRepositoryInterface
{
    public function find($id): GuestUser
    {
        $guestUser = GuestUser::find($id);

        if (!$guestUser) {
            throw new Exception("There is no user with that id/key!");
        }

        return $guestUser;
    }
}
