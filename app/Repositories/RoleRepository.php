<?php

namespace App\Repositories;

use App\Interfaces\repositories\RoleRepositoryInterface;
use Exception;
use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;

class RoleRepository implements RoleRepositoryInterface
{
    public function __construct(){}

    public function all(bool $noEmptyValues = true): Collection
    {
        $roles = Role::all();

        if (count($roles) == 0 && $noEmptyValues) {
            throw new Exception("There where no roles found in the database.", 404);
        }

        return $roles;
    }
}
