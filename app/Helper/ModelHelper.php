<?php

namespace App\Helper;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ModelHelper extends Controller
{
    /**
     * Returns the base query from the products model.
     * @return \Illuminate\Database\Eloquent\Builder<Product>
     */
    public static function ProductsBaseQuery(): Builder
    {
        return Product::query()
            ->select('products.*');
    }
}
