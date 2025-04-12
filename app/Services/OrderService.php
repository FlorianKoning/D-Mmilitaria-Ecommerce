<?php

namespace App\Services;

use Exception;
use App\Models\Order;
use App\Models\Product;
use App\Models\GuestUser;
use App\Models\OrderStatus;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    /**
     * Creates a new order in the database.
     * @param array $orderInfo
     * @param array $orderItems
     * @param int $paymentAmount
     * @return Order|bool
     */
    public static function create(array $orderInfo, array $orderItems, int $paymentAmount): Order|bool
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
        $orderNumber = self::createOrderNumber();


        // creates the new order
        $order = Order::create([
            'order_number' => $orderNumber,
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
        $itemArray = array();

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


    /**
     * Creates the order number for the new order.
     * @return string
     */
    private static function createOrderNumber(): string
    {
        $template = "C".substr(env('APP_NAME'), 0, 2)."-";
        $intSize = 7;
        $orderAmount = count(DB::table('orders')->select('*')->get()) + 1;
        $orderAmountLen = strlen((string)$orderAmount);

        $randomNumber = random_int(10000, 99999);
        $checkSum = 12;


        for ($i = 1; $i <= ($intSize - $orderAmountLen); $i++) {
            $template .= "0";
        }
        $template .= ($orderAmount == 0) ? 1 : $orderAmount;
        $template .= "-".$randomNumber;


        return $template .= "-".$checkSum;
    }
}
