<?php

namespace App\Interfaces\repositories;

use Illuminate\Pagination\LengthAwarePaginator;

interface ProductRepositoryInterface
{
    public function soldProducts(bool $noEmptyValue = true, int $paginateAmount): LengthAwarePaginator;
    public function available(bool $noEmptyValue = true, int $paginateAmount): LengthAwarePaginator;
}
