<?php 

namespace App\Interfaces\repositories;

use Illuminate\Database\Eloquent\Collection;

interface ProvincesRepositoryInterface
{
    public function all(): Collection;
}