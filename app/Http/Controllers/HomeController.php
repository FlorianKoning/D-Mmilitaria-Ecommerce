<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Helper\Functions;
use App\Helper\ModelHelper;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\LandCatagories;
use App\Models\Product_category;
use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct(
        protected ProductRepository $productRepository,
    ){parent::__construct();}

    /**
     * Display a listing of the resource.
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {
        // Checks there was a filter option selected
        if (isset($request->category) || isset($request->landCategory) || $request->search) {
            $products = $this->filter($request->search, $request->category, $request->landCategory);
        }

        return view('frontPage', [
            'products' => (isset($products)) ? $products : $this->productRepository->available($this->paginateAmount),
            'catagories' => Product_category::all(),
            'landCatagories' => LandCatagories::all(),
            'latestUpdate' => (Functions::getLatestupdate() != null) ? Functions::getLatestupdate() : 'Er zijn nog geen updates.',
        ]);
    }

    public function archive(Request $request): View
    {
        // Checks there was a filter option selected
        if (isset($request->category) || isset($request->landCategory) || $request->search) {
            $products = $this->filter($request->search, $request->category, $request->landCategory, false);
        }

        return view("frontPage", [
            'products' => (isset($products)) ? $products : $this->productRepository->soldProducts($this->paginateAmount),
            'catagories' => Product_category::all(),
            'landCatagories' => LandCatagories::all(),
            'latestUpdate' => (Functions::getLatestupdate() != null) ? Functions::getLatestupdate() : 'Er zijn nog geen updates.',
        ]);
    }

    /**
     * Summary of filter
     * @param string $search
     * @param int $category
     * @param int $landCategory
     * @return Collection<int, Product>
     */
    private function filter(?string $search, ?array $category, ?array $landCategory, bool $noSoldProduct = true): Collection
    {
        $baseQuery = ModelHelper::ProductsBaseQuery()
                ->leftJoin('land_catagories_links', 'land_catagories_links.product_id', '=', 'products.id')
                ->leftJoin('product_catagory_links', 'product_catagory_links.product_id', '=', 'products.id');


        // Checks if there was a search
        if (isset($search)) {
            $baseQuery->where('name', 'like', '%'.$search.'%');
        }


        // Checks if a product category was selected
        if (isset($category)) {
            $baseQuery->whereIn('product_catagory_links.product_categories_id', $category);
        }


        // Checks if a land category was selected
        if (isset($landCategory)) {
            $baseQuery->whereIn('land_catagories_links.land_categories_id', $landCategory);
        }

        return ($noSoldProduct) ? $baseQuery->where('products.inventory', '>', 0)->get() : $baseQuery->get();
    }
}
