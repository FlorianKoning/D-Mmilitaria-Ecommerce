<?php

namespace App\Helper;

use stdClass;
use App\Models\Cart;
use App\Models\Product;
use App\Models\LatestUpdate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection;

class Functions
{
    /**
     * Checks if the request uri contains the given string and returns the given true and false values
     * @return string
     */
    public static function requestUriCheck(string $contains, string $trueValue, string $falseValue): string
    {
        return str_contains($_SERVER['REQUEST_URI'], $contains) ? $trueValue : $falseValue;
    }



    /**
     * This function should be called when a product is created or updated.
     * This will add a new timestamp to the database table and will be showcased on the frontpage.
     * @return void
     */
    public static function storeLatestUpdate(): void
    {
        LatestUpdate::create();
    }


    /**
     * This function should be called when you want the latest "latest update" for the front-end.
     * This will return the latest "latest update".
     * @return string|null
     */
    public static function getLatestupdate(): string|null
    {
        // Checks if the datatbase table is empty.
        if (LatestUpdate::exists()) {
            return date('d-m-Y', strtotime(DB::table('latest_updates')->orderBy('created_at', 'desc')->first()->created_at));
        }


        // Returns null when the database table is empty.
        return null;
    }


    /**
     * Checks if the product has a discount
     * @param mixed $item
     * @return bool
     */
    public static function hasDiscount($item): bool
    {
        $today = date('Y-m-d');
        if (isset($item->discount_percentage) && $item->discount_percentage != null && $item->discount_start_date >= $today && $item->discount_end_date > $today) {
            return true;
        }

        return false;
    }


    public static function itemHandle(array|object $cart): bool
    {
        // Checks if the user is logged in.
        if (!Auth::check()) {
            foreach ($cart as $key => $item) {
                $product = Product::find($item['id']);
                $product->update([
                    'inventory'  => ($product['inventory'] - $item['amount'])
                ]);

                unset($cart[$key]);
            }

            Session::put('cart', $cart);

            return true;
        }

        foreach ($cart as $key => $item) {
            // Deletes the products from the cart
            $cartItem = Cart::where('product_id', $item->product_id)->where('user_id', $item->user_id)->first();
            $cartItem->delete();

            // Removes the inventory from the product based on the order.
            $product = Product::find($item->product_id);
            $product->update([
                'inventory' => $product->inventory - $item->amount
            ]);
        }

        return true;
    }
}
