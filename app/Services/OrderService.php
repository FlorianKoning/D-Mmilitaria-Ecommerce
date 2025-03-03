<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use App\Models\GuestUser;
use App\Models\OrderStatus;
use Exception;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    /**
     * Creates a new order in the database.
     * @param array $orderInfo
     * @param array $orderItems
     * @param int $paymentAmount
     * @return Order
     */
    public static function create(array $orderInfo, array $orderItems, int $paymentAmount): Order
    {
        // Creates a new guest account if needed.
        if (!Auth::check()) {
            if (!GuestUser::where('email', $orderInfo['email-address'])->exists()) {
                GuestUser::create([
                    'first_name' => $orderInfo['first-name'],
                    'last_name' => $orderInfo['last-name'],
                    'email' => $orderInfo['email-address']
                ]);
            }
            $guest = GuestUser::where('email', $orderInfo)->first();
        }
        // Creates a usable json array from the order items
        $productsArray = self::createItemArray($orderItems);


        // creates the new order
        $order = Order::create([
            'user_id' => (isset($guest)) ? null : Auth::user()->id,
            'guest_user_id' => (isset($guest)) ? $guest['id'] : null,
            'order_items' => $productsArray,
            'payment_amount' => $paymentAmount,
            'order_status_id' => OrderStatus::$open
        ]);

        return $order;
    }


    /**
     * Creates a usable json array for the order.
     * @param array $orderItems
     * @throws \Exception
     * @return bool|string
     */
    private static function createItemArray(array $orderItems): bool|string
    {
        $itemArrray = array();

        foreach ($orderItems as $key => $item) {
            if (Product::find($key) == null) {
                throw new Exception('The product in the orderItems array does not exist.');
            }

            $product =  Product::find($key);

            $itemArray[]['id'] = $product['id'];
            $itemArray[]['name'] = $product['name'];
            $itemArray[]['amount'] = $item;
        }

        return json_encode($itemArray);
    }
}
