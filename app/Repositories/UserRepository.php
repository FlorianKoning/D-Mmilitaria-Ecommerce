<?php

namespace App\Repositories;

use App\Utils\DateHelper;
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
            throw new Exception("There is no user with that id: [$id]");
        }

        return $user;
    }


    public function all(bool $noEmptyValues = true): Collection
    {
        $users = User::select('users.*', 'roles.name as role_name')
            ->leftJoin('roles', 'users.role_id', '=', 'roles.id')->get();

        if (count($users) == 0) {
            throw new Exception("There where no users found in the database!");
        }

        return $users;
    }


    public function newsletter(bool $noEmptyValue = true): Collection
    {
        $users = User::select('first_name', 'last_name', 'email')
            ->where('newsletter', true)->get();

        if (count($users) == 0 && $noEmptyValue) {
            throw new Exception("There where no users found in the database who subscribed to the database.");
        }

        return $users;
    }

    /**
     * Returns an collection of all the new users.
     * @param string $option
     * @return void
     */
    public function newUsers(string $option = "thisWeek"): Collection
    {
        $dateHelper = new DateHelper();

        switch ($option) {
            case 'thisWeek':
                $dateArray = $dateHelper->thisWeek();
                break;
            case 'lastWeek':
                $dateArray = $dateHelper->lastWeek();
                break;
            
            default:
                throw new Exception("this option does not exist: [options: $option]", 500);
        }

        return User::defaultQuery()->whereBetween('created_at', [$dateArray['startOfWeek'], $dateArray['endOfWeek']])->get();
    }
}
