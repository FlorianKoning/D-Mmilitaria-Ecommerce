<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Helper\Functions;
use App\Helper\ModelHelper;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\LandCatagories;
use App\Models\Product_category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {
        // Checks there was a filter option selected
        if (isset($request->category) || isset($request->landCategory)) {
            $baseQuery = ModelHelper::ProductsBaseQuery()
                ->leftJoin('land_catagories_links', 'land_catagories_links.product_id', '=', 'products.id')
                ->leftJoin('product_catagory_links', 'product_catagory_links.product_id', '=', 'products.id');


            if (isset($request->category)) {
                $baseQuery->whereIn('product_catagory_links.product_categories_id', $request->category);
            }


            if (isset($request->landCategory)) {
                $baseQuery->whereIn('land_catagories_links.land_categories_id', $request->landCategory);
            }


            $products = $baseQuery->get();
        }


        return view('frontPage', [
            'products' => (isset($products)) ? $products->unique() : Product::frontPage(),
            'catagories' => Product_category::all(),
            'landCatagories' => LandCatagories::all(),
            'latestUpdate' => (Functions::getLatestupdate() != null) ? Functions::getLatestupdate() : 'Er zijn nog geen updates.',
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
