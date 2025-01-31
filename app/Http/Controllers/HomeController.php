<?php

namespace App\Http\Controllers;

use App\Helper\Functions;
use App\Models\LandCatagories;
use App\Models\Product;
use App\Models\Product_category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('frontPage', [
            'products' => Product::frontPage(),
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
        dd($product);
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
