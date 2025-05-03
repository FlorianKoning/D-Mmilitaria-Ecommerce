<?php 

namespace App\Repositories;

use App\Interfaces\Repositories\ProvincesRepositoryInterface;
use App\Models\Province;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class ProvincesRepository implements ProvincesRepositoryInterface
{
    /**
     * Returns an collection of all the provinces in the database.
     * @return void
     */
    public function all(): Collection
    {
        $provinces = Province::all();

        if (!$provinces) {
            throw new Exception("No privinces found in the database!");
        }

        return $provinces;
    }
}   