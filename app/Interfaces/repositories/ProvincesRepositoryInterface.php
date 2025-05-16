<?php 

namespace App\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface ProvincesRepositoryInterface
{
    public function all(): Collection;
}