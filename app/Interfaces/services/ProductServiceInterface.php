<?php

namespace App\Interfaces\services;

use App\Models\Product;

interface ProductServiceInterface
{
    public function update(array $updateArray, Product $product): Product;
}
