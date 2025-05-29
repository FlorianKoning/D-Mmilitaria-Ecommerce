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
    public function soldProducts(bool $noEmptyValue = true, int $paginateAmount): LengthAwarePaginator
    {
        $products = Product::where('inventory', 0)->paginate($paginateAmount);

        if (count($products) >! 0 && $noEmptyValue) {
            throw new Exception('There where no sold products found in the database', 404);
        }

        return $products;
    }


    /**
     * Returns all the available products that can be sold.
     * @param bool $noEmptyValue
     * @param int $paginateAmount
     * @throws \Exception
     * @return LengthAwarePaginator
     */
    public function available(bool $noEmptyValue = true, int $paginateAmount): LengthAwarePaginator
    {
        $products = Product::where('inventory', '>', 0)->paginate($paginateAmount);

         if (count($products) >! 0 && $noEmptyValue) {
            throw new Exception('There where no sold products found in the database', 404);
        }

        return $products;
    }
}
