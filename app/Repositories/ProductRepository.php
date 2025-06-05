<?php

namespace App\Repositories;

use App\Interfaces\repositories\ProductRepositoryInterface;
use App\Models\Product;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * Returns all the sold products in the database.
     * @param bool $noEmptyValue
     * @param int $paginateAmount
     * @throws \Exception
     * @return LengthAwarePaginator
     */
    public function soldProducts(int $paginateAmount): LengthAwarePaginator
    {
        $products = Product::where('inventory', 0)->paginate($paginateAmount);

        return $products;
    }


    /**
     * Returns all the available products that can be sold.
     * @param bool $noEmptyValue
     * @param int $paginateAmount
     * @throws \Exception
     * @return LengthAwarePaginator
     */
    public function available(int $paginateAmount): LengthAwarePaginator
    {
        $products = Product::where('inventory', '>', 0)->paginate($paginateAmount);

        return $products;
    }
}
