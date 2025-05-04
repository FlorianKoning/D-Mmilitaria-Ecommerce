<?php

namespace App\Interfaces\services;

use App\Models\Order;

interface OrderMailServiceInterface
{
    public function newOrderHandler(array $shipping, Order $order): void;
    public function newOrder(array $shipping, Order $order): void;
    public function newOrderAdmin(array $shipping, Order $order): void;
    public function bankTransfer(Order $order, string $email, string $name): void;
    public function paymentReceived(string $email, Order $order): void;
}
