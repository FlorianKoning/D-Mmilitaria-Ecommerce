<?php

namespace App\Interfaces\services;

use App\Models\Order;
use App\Models\Shipping;

interface ShippingServiceInterface
{
    public function create(array $shipping, Order $order): Shipping;
}
