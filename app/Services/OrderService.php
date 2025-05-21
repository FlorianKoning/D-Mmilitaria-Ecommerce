<?php

namespace App\Services;

use Exception;
use App\Models\Order;
use App\Models\Product;
use App\Models\GuestUser;
use App\Models\OrderStatus;
use App\Models\PaymentOption;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\OrderServiceInterface;

class OrderService implements OrderServiceInterface
{
    /**
     * Creates a new order in the database.
     * @param array $orderInfo
     * @param array $orderItems
     * @param int $paymentAmount
     * @return Order|bool
     */
    public function create(array $orderInfo, array $orderItems, int $paymentAmount, PaymentOption $paymentOption): Order|bool
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
        $productsArray = $this->createItemArray($orderItems);
        $orderNumber = $this->createOrderNumber();


        // Checks if the payment option is banktransfer
        // Devides the payment amount by 10
        if ($paymentOption['id'] == 1) {
            $paymentAmount = $paymentAmount / 10;
        }


        // creates the new order
        $order = Order::create([
            'order_number' => $orderNumber,
            'payment_option_id' => $paymentOption['id'],
            'user_id' => (isset($guest)) ? null : Auth::user()->id,
            'guest_user_id' => (isset($guest)) ? $guest['id'] : null,
            'order_items' => $productsArray,
            'payment_amount' => $paymentAmount,
            'order_status_id' => OrderStatus::$open
        ]);


        return $order;
    }

    /**
     * Returns the amount of items that where in the order.
     * @param string $orderItems
     * @return int
     */
    public function itemAmount(string $orderItems): int
    {
        $items = json_decode($orderItems);
        $count = 0;

        foreach ($items as $item) {
            $amount = (int) $item->amount;
            for ($i = 0; $i <= $amount - 1; $i++) {
                $count++;
            }
        }

        return $count;
    }


    /**
     * Creates a usable json array for the order.
     * @param array $orderItems
     * @throws \Exception
     * @return bool|string
     */
    private function createItemArray(array $orderItems): bool|string
    {
        $itemArray = array();
        $count = 0;

        foreach ($orderItems as $key => $item) {
            if (Product::find($key) == null) {
                throw new Exception('The product in the orderItems array does not exist.');
            }

            $product =  Product::find($key);

            $itemArray[$count]['id'] = $product['id'];
            $itemArray[$count]['name'] = $product['name'];
            $itemArray[$count]['amount'] = $item;

            $count++;
        }

        return json_encode($itemArray);
    }


    /**
     * Creates the order number for the new order.
     * @return string
     */
    private function createOrderNumber(): string
    {
        $template = "";
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
