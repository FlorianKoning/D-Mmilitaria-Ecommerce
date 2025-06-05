<?php

namespace App\Http\Controllers\Cms;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductUpdateRequest;
use App\Repositories\ProductRepository;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;

class CmsSoldProductsController extends Controller
{
    public function __construct(
        protected ProductRepository $productRepository,
        protected ProductService $productService,
    ){parent::__construct();}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("cms.soldProducts.index", [
            'products' => $this->productRepository->soldProducts($this->paginateAmount),
            'columnNames' => Product::$columnNames
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'inventory' => ['required', 'numeric']
        ]);

        $this->productService->update([
            'inventory' => $request->inventory
        ], $product);

        return redirect()->route('cms.products.index')->with('success', 'Product Inventory geupdate.');
    }

    /**
     * Updates the active status from the given product
     * @param \App\Http\Requests\ProductUpdateRequest $request
     * @param \App\Models\Product $product
     * @return RedirectResponse
     */
    public function active(Request $request, Product $product): RedirectResponse
    {
        $this->productService->update([
            'is_active' => ($request->active == 'true') ? true : false
        ], $product);

        return redirect()->route('cms.soldProducts.index')->with('success', 'Product Inventory geupdate.');
    }
}
