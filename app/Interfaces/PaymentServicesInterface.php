<?php

namespace App\Interfaces;

use App\Models\Order;

interface PaymentServicesInterface
{
    public function __construct(string $email, array|object $cart, string $name, Order $order);
    public function send(): void;
}
