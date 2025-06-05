<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ShippingCountry;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    /**
     * Returns all the projects from the live search input
     */
    public function liveSearch(String $input, string $table)
    {
        $project = DB::table($table)
            ->where($table.'.name', 'LIKE', "%$input%")
            ->get();

        return response()->json($project);
    }


    /**
     * Returns the a project from the given id
     */
    public function getOptions(string $id, string $table)
    {
        $option = DB::table($table)
            ->where('id', $id)
            ->first()->name;

            return response()->json($option);
    }

    /**
     * Returns all the payment option id's.
     */
    public function paymentId()
    {
        $paymentId = DB::table('payment_options')
            ->select('id')
            ->get();

        return response()->json($paymentId);
    }

    public function shippingCountry(ShippingCountry $shippingCountry)
    {
        return response()->json($shippingCountry);
    }

    /**
     * Retuns an array with all the extra images and the main image on the 0 index.
     * @param \App\Models\Product $product
     * @return JsonResponse|mixed
     */
    public function getImageArray(Product $product): JsonResponse
    {
        $mainImage = $product->main_image;
        $extraImages = ProductImage::where('product_id', $product->id)->get();
        $array = array();

        $array[0] = $mainImage;
        foreach ($extraImages as $image) {
            $array[] = $image->image_url;
        }

        return response()->json($array);
    }
}
