<?php 

namespace App\Interfaces\Factories;

use App\Models\Order;

interface OrderStatusFactoryInterface
{
    public function make(string $orderStatus, Order $order): void;
}