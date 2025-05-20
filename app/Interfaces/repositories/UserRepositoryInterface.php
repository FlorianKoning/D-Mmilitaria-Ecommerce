<?php

namespace App\Interfaces\repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function find($id): User;
    public function all(): Collection;
}