<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\PaymentOption;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\CartService;
use Illuminate\Http\RedirectResponse;
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

        // Checks if the cart is not empty
        if ($cart != null) {
            $totalPrice = $this->totalPrice($cart);
        }

        return view('cart.cart-index', [
            'cartService' => new CartService,
            'cart' => $cart,
            'totalPrice' => (isset($totalPrice)) ? $totalPrice : null,
            'paymentOptions' => PaymentOption::all(),
            'paymentTranslation' => PaymentOption::$columnTranslations,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Product $product): RedirectResponse
    {
        // add product to cart
        if (CartService::add($product) == true) {
            return redirect()->route('products.show', $product->id)->with('productAdded', 'Product is toegevoegd aan uw winkelmandje.');
        } else { // CartService::add returned false
            return redirect()->route('products.show', $product->id)->with('productNotAdded', 'Product kon niet worden toegevoegt, er zijn niet genoeg producten in verkoop.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Product $product, int $amount): RedirectResponse
    {
        // Updates the amount from the product in the cart
        CartService::update($product, $amount);

        // Return the user to the last page
        return redirect()->route('cart.index')->with('productUpdated', 'Het product is succesful geupdate in uw winkelmandje.');
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
        // Removes one amount from the product, or deletes the product from the cart
        CartService::destroy($product);

        // Return the user to the last page
        return redirect()->route('cart.index')->with('productRemoved', 'Het product is succesful verwijderd uit uw winkelmandje.');
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
                $totalPrice += (int)($price['oldPrice'] * $item->amount);
            }
        }


        return $totalPrice;
    }
}
