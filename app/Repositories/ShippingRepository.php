<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\Shipping;
use App\Interfaces\Repositories\ShippingRepositoryInterface;
use Exception;

class ShippingRepository implements ShippingRepositoryInterface
{
    /**
     * Returns an shipping instance from the database with the given order id.
     * @param \App\Models\Order $order
     * @throws \Exception
     * @return Shipping
     */
    public function findWithOrder(Order $order): Shipping
    {
        $shipping = Shipping::where('order_id', $order->id)->first();

        if ($shipping == null) {
            Throw new Exception('There is no shipping collection with that order id in the database.');
        }

        return $shipping;
    }
}
