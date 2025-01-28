<?php

namespace App\Http\Controllers\Cms;

use App\Models\Product;
use App\Helper\Functions;
use Illuminate\View\View;
use App\Models\ProductImage;
use App\Services\FileService;
use App\Models\ProductFeature;
use App\Models\Product_category;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

class CmsProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('cms.products.products-index', [
            'products' => Product::getAll(50),
            'columnNames' => Product::$columnNames
        ]);
    }


    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        // Gets the id of the new product.
        // this is needed so that the application knows what product the extraImages and extraFeatures need to "join" with.
        $newProductId = (Product::orderBy('id', 'desc')->first()->id) + 1;


        return view('cms.products.products-create', [
            'newProductid' => $newProductId,
        ]);
    }


    /**
     * Shows the user the extra tables and options for the product.
     * @param \App\Models\Product $product
     * @return \Illuminate\Contracts\View\View
     */
    public function extra(Product $product): View
    {
        return view('cms.products.products-extra', [
            'product' => $product,
            'imagesColumn' => ProductImage::$columnNames,
            'featuresColumn' => ProductFeature::$columnNames,
            'extraImages' => ProductImage::where('product_id', $product->id)->get(),
            'extraFeatures' => ProductFeature::where('product_id', $product->id)->get(),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     * @param \App\Http\Requests\ProductStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductStoreRequest $request): RedirectResponse
    {
        // Variables
        $validated = $request->validated();
        $fileUrl = FileService::imageUpload($validated['productImage'], $validated['name']);


        // Checks if the start and end date are not the same value
        if ($validated['discountStartDate'] == $validated['discountEndDate'] && $validated['discountStartDate'] != '' && $validated['discountEndDate'] != '') {
            return redirect()->route('cms.products.create')->withErrors(['discountStartDate' => 'De begin en eind datum kunnen niet op de zelfde dag zijn.']);
        }


        // Creates the new product
        Product::create([
            'inventory_number' => $validated['invNumb'],
            'name' => $validated['name'],
            'small_desc' => $validated['smallDesc'],
            'big_desc' => $validated['bigDesc'],
            'catagory_id' => $validated['catagory'],
            'inventory' => $validated['inventory'],
            'price' => $validated['price'],
            'main_image' => $fileUrl,
            'discount_percentage' => $validated['discountPercentage'],
            'discount_start_date' => $validated['discountStartDate'],
            'discount_end_date' => $validated['discountEndDate'],
        ]);


        // Updates the lastupdated database table
        Functions::storeLatestUpdate();


        // returns the user back to the overview table
        return redirect()->route('cms.products.index')->withErrors('storeSucces', 'Het nieuwe product is succesvol aangemaakt.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('cms.products.products-edit', [
            'product' => $product,
            'catagories' => Product_category::find($product->catagory_id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param \App\Http\Requests\ProductUpdateRequest $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductUpdateRequest $request, Product $product): RedirectResponse
    {
        // Variables
        $validated = $request->validated();


        // Checks if productImage exist. if so, create the file url
        if (isset($validated['productImage'])) {
            $fileUrl = FileService::imageUpload($validated['productImage'], $validated['name']);
        }


        // Checks if the start and end date are not the same value
        if ($validated['discountStartDate'] == $validated['discountEndDate'] && $validated['discountStartDate'] != '' && $validated['discountEndDate'] != '') {
            return redirect()->route('cms.products.create')->withErrors(['discountStartDate' => 'De begin en eind datum kunnen niet op de zelfde dag zijn.']);
        }


        // Creates the new product
        $product->update([
            'inventory_number' => $validated['invNumb'],
            'name' => $validated['name'],
            'small_desc' => $validated['smallDesc'],
            'big_desc' => $validated['bigDesc'],
            'catagory_id' => $validated['catagory'],
            'inventory' => $validated['inventory'],
            'price' => $validated['price'],
            'main_image' => (isset($validated['productImage'])) ? $fileUrl : $product->product_image_url,
            'discount_percentage' => (isset($validated['discountPercentage'])) ? $validated['discountPercentage'] : $product->discount_percentage,
            'discount_start_date' => (isset($validated['discountStartDate'])) ? $validated['discountStartDate'] : $product->discount_start_date,
            'discount_end_date' => (isset($validated['discountEndDate'])) ? $validated['discountEndDate'] : $product->discount_end_date,
            'is_active' => (isset($validated['makeActive'])) ? 1 :((isset($validated['makeInActive'])) ? 0 : 1),
        ]);


        // Updates the lastupdated database table
        Functions::storeLatestUpdate();


        // returns the user back to the overview table
        return redirect()->route('cms.products.index')->withErrors('updateSucces', "$product->inventory_number is succesvol geupdate.");
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
        $inventory_number = $product->inventory_number;

        $product->delete();

        return redirect()->route('cms.products.index')->with('deleteSucces', "Product $inventory_number is succesvol verwijderd.");
    }
}
