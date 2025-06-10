<?php

namespace App\Repositories;

use App\Interfaces\repositories\GuestUserRepositoryInterface;
use Exception;
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
