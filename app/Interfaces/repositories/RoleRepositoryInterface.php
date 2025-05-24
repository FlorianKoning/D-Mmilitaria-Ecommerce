<?php

namespace App\Interfaces\repositories;

use Illuminate\Database\Eloquent\Collection;

interface RoleRepositoryInterface
{
    public function all(bool $noEmptyValues = true): Collection;
}
