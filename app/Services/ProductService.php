<?php

namespace App\Services;

use App\Interfaces\services\ProductServiceInterface;
use App\Models\Product;

class ProductService implements ProductServiceInterface
{
    /**
     * Updates the product with the given array.
     * @param array $updateArray
     * @param \App\Models\Product $product
     * @return Product
     */
    public function update(array $updateArray, Product $product): Product
    {
        $product->update($updateArray);

        return $product;
    }
}
