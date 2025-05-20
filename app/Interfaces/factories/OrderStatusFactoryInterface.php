<?php 

namespace App\Interfaces\factories;

use App\Models\Order;

interface OrderStatusFactoryInterface
{
    public function make(string $orderStatus, Order $order): void;
}