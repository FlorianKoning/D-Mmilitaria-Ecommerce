<?php

namespace App\Interfaces\repositories;

use Illuminate\Pagination\LengthAwarePaginator;

interface ProductRepositoryInterface
{
    public function soldProducts(int $paginateAmount): LengthAwarePaginator;
    public function available(int $paginateAmount): LengthAwarePaginator;
}
