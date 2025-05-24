<?php

namespace App\Interfaces\repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function find($id): User;
    public function all(bool $noEmptyValues = true): Collection;
    public function newsletter(bool $noEmptyValue = true): Collection;
}
