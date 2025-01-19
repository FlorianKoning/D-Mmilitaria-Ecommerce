<?php

namespace App\Services;

use stdClass;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\CartServiceInterface;

class CartService implements CartServiceInterface
{
    /**
     * Adds product to the cart depending if the user is logged in.
     * @param \App\Models\Product $product
     * @return void
     */
    public static function add(Product $product): void
    {
        // Checks if the user is logged in
        if (Auth::check()) {
            // checks if user already has the same product in cart
            if (Cart::where('product_id', $product->id)->where('user_id', Auth::user()->id)->count() > 0) {
                $cart = Cart::where('product_id', $product->id)->where('user_id', Auth::user()->id)->first();
                $amount = $cart->amount;


                // updates the amount
                $cart->update([
                    'amount' => $amount += 1,
                ]);
            } else {
                Cart::create([
                    'product_id' => $product->id,
                    'user_id' => Auth::user()->id,
                    'amount' => 1,
                ]);
            }
        } else { // User is nog logged in, store product in session array
            $cart = (session()->exists('cart')) ? session()->get('cart') : array();


            // Checks if product is already in cart
            if (isset($cart[$product->name])) {
                $cart[$product->name]['amount'] += 1;
            } else {
                // set up the new product
                $cart[$product->name] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'description' => $product->small_desc,
                    'product_image_url' => $product->product_image_url,
                    'inventory' => $product->inventory,
                    'price' => $product->price,
                    'amount' => 1,
                ];
            }


            // puts cart in session array
            session()->put('cart', $cart);
        }
    }


    /**
     * Updates the amount of the product in the cart.
     * @param \App\Models\Product $product
     * @param int $amount
     * @return void
     */
    public static function update(Product $product, int $amount): void
    {
        $cart = (Auth::check()) ? Cart::where('user_id', Auth::user()->id)->get() : session()->get('cart');


        // Checks if user is logged in
        if (Auth::check()) {
            // Updates the cart in the database
            Cart::where('user_id', Auth::user()->id)
                ->where('product_id', $product->id)
                ->update([
                    'amount' => $amount
                ]);
        } else {
            // Updates the cart in the session
            foreach ($cart as $key => $item)
            {
                if ($item['id'] == $product['id']) {
                    $cart[$key]['amount'] = $amount;
                }
            }


            // Sets the updated array in the
            session()->put('cart', $cart);
        }
    }


    /**
     * Returns how many items there are in the users cart.
     * If the users has no items it will return null.
     * @return int
     */
    public static function count(): int
    {
        // based on if user is logged in, get database or session cart
        $cart = (Auth::check()) ? Cart::where('user_id', Auth::user()->id)->get() : session()->get('cart');
        $amount = 0;


        // counts how many items there are in cart
        if ($cart != null) {
            foreach($cart as $value) {
                $amount += $value['amount'];
            }
        }


        return $amount;
    }


    /**
     * Returns an object of all the cart items from the given user id.
     * @param int $userId
     * @return \Illuminate\Support\Collection
     */
    public static function get(int $userId)
    {
        return DB::table('carts')
            ->select('*')
            ->leftJoin('products', 'carts.product_id', '=', 'products.id')
            ->get();
    }


    /**
     * Deletes the product from the cart. If the product has a mount > then 1, remove just 1 from the amount.
     * @param \App\Models\Product $product
     * @return void
     */
    public static function destroy(Product $product): void
    {
        // Gets the cart
        $cart = (Auth::check()) ? Cart::where('user_id', Auth::user()->id)->get() : session()->get('cart');


        // Checks if the user is logged in
        if (Auth::check()) {
            // deletes cart item from database
            Cart::where('user_id', Auth::user()->id)->where('product_id', $product->id)->delete();
        } else {
            // Loop through the cart and checks what item has to be deleted
            foreach ($cart as $key => $item)
            {
                if ($item['id'] == $product['id']) {
                    unset($cart[$key]);
                }
            }


            // Sets the updated array in the
            session()->put('cart', $cart);
        }

    }


    /**
     * Checks what the price is of the product.
     * @param int $productId
     * @return array
     */
    public static function price(int $productId): array
    {
        // Variables
        $product = Product::find($productId);
        $date = date('Y-m-d');
        $prices = array();


        // Checks if the discount date is due.
        if ($date < $product->discount_end_date) {
            $discountPrice =  $product->price - ($product->price / 100 * $product->discount_percentage);

            // Sets the new price in the prices array.
            $prices['newPrice'] = $discountPrice;
        }


        // Sets the old price in the prices array and returns the prices array.
        $prices['oldPrice'] = $product->price;
        return $prices;
    }
}
