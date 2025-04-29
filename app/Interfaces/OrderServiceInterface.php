<?php

namespace App\Interfaces;

use App\Models\Order;
use App\Models\PaymentOption;

interface OrderServiceInterface
{
    /**
     * Creates a new order in the database.
     * @param array $orderInfo
     * @param array $orderItems
     * @param int $paymentAmount
     * @param \App\Interfaces\PaymentOption $paymentOption
     * @return void
     */
    public static function create(array $orderInfo, array $orderItems, int $paymentAmount, PaymentOption $paymentOption): Order|bool;
}
