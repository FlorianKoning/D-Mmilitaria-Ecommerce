<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view('products.products-show', [
            'product' => $product
        ]);
    }
}
