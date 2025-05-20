<?php

namespace App\Interfaces\repositories;

use App\Models\GuestUser;

interface GuestUserRepositoryInterface
{
    public function find($id): GuestUser;
}