<?php

namespace App\Http\Controllers\Cms;

use App\Models\Product;
use App\Helper\Functions;
use Illuminate\View\View;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Services\FileService;
use App\Models\LandCatagories;
use App\Models\ProductFeature;
use App\Models\Product_category;
use App\Models\LandCatagoriesLink;
use App\Http\Controllers\Controller;
use App\Models\Product_catagoryLink;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Repositories\ProductRepository;
use App\Services\ProductService;

class CmsProductsController extends Controller
{
    private $model;
    private array $options = array();

    public function __construct(
        protected ProductRepository $productRepository,
        protected ProductService $productService,
    ){
        // * Extends the parent constructor class
        parent::__construct();

        $this->options = [
            'land' => new LandCatagoriesLink(),
            'product' => new Product_catagoryLink(),
        ];
    }


    private function setOption(string $option): void
    {
        $this->model = $this->options[$option];
    }


    /**
     * Display a listing of the resource.
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('cms.products.products-index', [
            'products' => $this->productRepository->available(false, $this->paginateAmount),
            'columnNames' => Product::$columnNames,
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
     * Shows the 2 tables to link product categories and land categories to the product.
     * @param \App\Models\Product $product
     * @return void
     */
    public function productCategories(Product $product): View
    {
        return view('cms.products.product-categories', [
            'product' => $product,
            'productName' => $product->name,

            'productCategoriesLinked' => new Product_catagoryLink(),
            'productCategories' => Product_category::all(),
            'productCategoryColumns' => Product_catagoryLink::$columnNames,
        ]);
    }



    public function landCategories(Product $product): View
    {
        return view('cms.products.product-land-categories', [
            'product' => $product,
            'productName' => $product->name,

            'landCategoriesColumns' => LandCatagoriesLink::$columnNames,
            'landCategories' => LandCatagories::all(),
            'productCategoriesLinked' => new LandCatagoriesLink(),
        ]);
    }


    /**
     * Links the product categories to the product
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return RedirectResponse
     */
    public function extraCategorieStore(Request $request, Product $product, string $option): RedirectResponse
    {
        // Checks if the option is a valid option
        if (!isset($this->options[$option])) {
            return redirect()->route('cms.products.index')->with('invalidOption', 'There was a error. An invalid option has been given.');
        }


        // Variables
        $this->setOption($option);
        $categories = $this->model::all();


        // Checks if nothing was selected and there are no links
        if ($this->isEmpty($request->categories, $product->id)) {
            return redirect()->route('cms.products.'.$option.'Categories', $product->id)
                ->with('productCategorieEmpty', 'Please select a categorie.');
        }


        // Checks if all the boxes where ticked off
        // And deletes all the product links with this product id
        if (empty($request->categories)) {
            $categoryLinks = $this->model::where('product_id', $product->id)->get();

            foreach ($categoryLinks as $links) {
                $links->delete();
            }

            return redirect()->route('cms.products.'.$option.'Categories', $product->id)
                ->with('success', 'All links have been removed');
        }


        // Loops through all the product categories to see if one is missing in the request array but does exist in the database.
        // If so, delete it from the database.
        foreach ($categories as $categorie) {
            if ($this->deleteCheck($categorie, $request->categories, $product->id, $option)) {
                $categoryLink = $this->model::where($option.'_categories_id', $categorie[$option.'_categories_id'])
                    ->where('product_id',  $product->id)->first();

                $categoryLink->delete();
            }
        }


        // Loops through the request array and if is does not exist in the database, store it in the database.
        foreach ($request->categories as $id => $switch) {
            if (!$this->model::exists($id, $product->id)) {
                $this->model::create([
                    $option."_categories_id" => $id,
                    'product_id' => $product->id
                ]);
            }
        }


        return redirect()->route('cms.products.'.$option.'Categories', $product->id)
            ->with('productCategorieLink', 'Gelukt om de categorie te linken aan het product');
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
        $fileUrl = FileService::imageUpload($validated['mainImage'], $validated['name']);


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
            'inventory' => $validated['inventory'],
            'price' => $validated['price'],
            'main_image' => (isset($validated['productImage'])) ? $fileUrl : $product->main_image,
            'discount_percentage' => (isset($validated['discountPercentage'])) ? $validated['discountPercentage'] : $product->discount_percentage,
            'discount_start_date' => (isset($validated['discountStartDate'])) ? $validated['discountStartDate'] : $product->discount_start_date,
            'discount_end_date' => (isset($validated['discountEndDate'])) ? $validated['discountEndDate'] : $product->discount_end_date,
            'is_active' => (isset($validated['makeActive'])) ? 1 :((isset($validated['makeInActive'])) ? 0 : 1),
        ]);


        // Updates the lastupdated database table
        Functions::storeLatestUpdate();


        // returns the user back to the overview table
        return redirect()->route('cms.products.index')->withErrors('success', "$product->inventory_number is succesvol geupdate.");
    }

    /**
     * Updates the is_active column from the given product.
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return RedirectResponse
     */
    public function updateActive(Request $request, Product $product): RedirectResponse
    {
        $this->productService->update([
            'is_active' => ($request->active == 'true') ? true : false,
        ], $product);


        return redirect()->route('cms.products.index')->with('success', 'Product is geupdate');
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

        return redirect()->route('cms.products.index')->with('success', "Product $inventory_number is succesvol verwijderd.");
    }


    private function isEmpty(?array $categories, int $product_id): bool
    {
        if (empty($categories) && $this->model::where('product_id', $product_id)->exists() == false) {
            return true;
        }

        return false;
    }


    private function deleteCheck(object $categorie, array $categories, int $product_id, string $option)
    {
        if (in_array($categorie->id, $categories) == false && $this->model::exists($categorie[$option.'_categories_id'], $product_id)) {
            return true;
        }

        return false;
    }
}
