<?php

namespace App\Interfaces\Repositories;

use App\Models\GuestUser;

interface GuestUserRepositoryInterface
{
    public function find($id): GuestUser;
}
