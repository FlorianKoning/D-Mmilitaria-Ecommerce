<?php

namespace App\Utils;

use App\Models\Order;
use App\Models\Product;
use App\Models\Reserved;

class ReservedHelper
{
    /**
     * Loops through the order items and create a new instance in the reserved database table.
     * Also updates the product inventory based on the amount that is in the order.
     * @param \App\Models\Order $order
     * @return bool
     */
    public function reserveProduct(Order $order): bool
    {
        $itemsObject = json_decode($order->order_items);

        // Loops through all the items from the order
        foreach ($itemsObject as $item) {
            $product = Product::find($item->id);

            // Creates new reserved instance
            for ($i = 0; $i <= $item->amount - 1; $i++) {
                Reserved::create([
                    'product_id' => $item->id,
                    'order_id' => $order->id
                ]);
            }

            // Updates the Product inventory
            $product->update([
                'inventory' => $product->inventory - $item->amount,
            ]);
        }

        return true;
    }


    /**
     * Does the opisite of of the reverseProduct. this one removes the entry's from the reserved database table.
     * And adds the items back to the product inventory.
     * @param \App\Models\Order $order
     * @return bool
     */
    public function unReserveProduct(Order $order): bool
    {
        $itemsObject = json_decode($order->order_items);

        foreach ($itemsObject as $item) {
            $product = Product::find($item->id);

            for ($i = 0; $i <= $item->amount - 1; $i++) {
                Reserved::where('product_id', $item->id)->delete();
            }

            // Updates the Product inventory
            $product->update([
                'inventory' => $product->inventory + $item->amount,
            ]);
        }

        return true;
    }
}
