<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{
    protected int $userId;
    protected float $paymentAmount;
    protected int $orderStatusId;
    protected int $paymentStatus;

    /**
     * Sets up the order variables.
     * @param int $userid
     * @param float $paymentAmount
     * @param int $paymentStatus
     */
    public function __construct(int $userid, float $paymentAmount, int $paymentStatus = 1)
    {
        $this->userId = $userid;
        $this->paymentAmount = $paymentAmount;
        $this->paymentStatus = $paymentStatus;
    }

    /**
     * Creates a new order in the database.
     * @return bool
     */
    public function create(): bool
    {
        Order::cerate([
            'user_id' => $this->userId,
            'payment_amount' => $this->paymentAmount,
            'order_status_id' => $this->orderStatusId,
        ]);

        return true;
    }
}
