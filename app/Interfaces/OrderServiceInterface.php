<?php

namespace App\Interfaces;

use App\Models\Order;
use App\Models\PaymentOption;

interface OrderServiceInterface
{
    public function create(array $orderInfo, array $orderItems, int $paymentAmount, PaymentOption $paymentOption): Order|bool;
}
