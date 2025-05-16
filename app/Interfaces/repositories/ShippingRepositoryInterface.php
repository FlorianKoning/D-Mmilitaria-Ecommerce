<?php

namespace App\Interfaces\Repositories;

use App\Models\Order;
use App\Models\Shipping;

interface ShippingRepositoryInterface
{
    public function findWithOrder(Order $order): Shipping;
}