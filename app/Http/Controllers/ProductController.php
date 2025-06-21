<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Collection;
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
            'extraImages' => self::orderImageArray(ProductImage::where('product_id', $product->id)->get()),
            'extraFeatures' => ProductFeature::where('product_id', $product->id)->get()
        ]);
    }

    /**
     * Handles the order of the extra images
     * @param \Illuminate\Database\Eloquent\Collection $images
     * @return object
     */
    public static function orderImageArray(Collection $images): object
    {
        $orderArray = array();
        $noValueArray = array();
        $returnArray = array();

        foreach($images as $image) {
            if ($image->order == null || $image->order == 0) {
                $noValueArray[] = $image;
            } else {
                $orderArray[(int) ($image->order - 1)] = $image;
            }
        }

        ksort($orderArray);
        
        $returnArray = array_merge($orderArray, $noValueArray);

        return (object) $returnArray;
    }
}
