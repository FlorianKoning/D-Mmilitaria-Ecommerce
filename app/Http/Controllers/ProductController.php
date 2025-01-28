<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\ProductImage;
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
            'product' => $product,
            'extraImages' => ProductImage::where('product_id', $product->id)->get(),
            'extraFeatures' => ProductFeature::where('product_id', $product->id)->get()
        ]);
    }
}
