<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\CartService;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Variables
        $cart = (Auth::check()) ? CartService::get(Auth::user()->id) : json_decode(json_encode(session()->get('cart')), associative: FALSE);
        $totalPrice = $this->totalPrice($cart);


        return view('cart.cart-index', [
            'cartService' => new CartService,
            'cart' => $cart,
            'totalPrice' => $totalPrice,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Product $product)
    {
        // add product to cart
        CartService::add($product);

        // returns the user to the product the added
        return redirect()->route('products.show', $product->id)->with('productAdded', 'Product is toegevoegd aan uw winkelmandje.');
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


    /**
     * Calculates the total price
     * @param object $cart
     * @return float|int
     */
    private function totalPrice(object $cart): float|int
    {
        $totalPrice = 0;

        foreach($cart as $item) {
            $price = CartService::price($item->id);

            if (isset($price['newPrice'])) {
                $totalPrice += ($price['newPrice'] * $item->amount);
            } else {
                $totalPrice += (int)($price['newPrice'] * $item->amount);
            }
        }


        return $totalPrice;
    }
}
