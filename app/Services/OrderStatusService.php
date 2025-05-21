<?php

namespace App\Services;

use App\Models\Order;
use App\Repositories\OrderStatusRepository;
use App\Utils\ReservedHelper;

class OrderStatusService
{
    public function __construct(
        protected OrderStatusRepository $orderStatusRepository,
        protected ReservedHelper $reservedHelper,
        protected OrderMailService $orderMailService,
    ){}


    /**
     * Sends a email to the user that the order has been canceled.
     * Removes the the order items from the resirved database table.
     * @param \App\Models\Order $order
     * @param string $email
     * @param string $name
     * @return void
     */
    public function canceled(Order $order, string $email, string $name): void
    {
        // Sends a email to the user that the order has been canceled.
        $this->orderMailService->canceledOrder($email, $name, $order);
    }


    /**
     * Sends a email to the user that the order has been paid.
     * Removes the the order items from the resirved database table.
     * @param \App\Models\Order $order
     * @param string $email
     * @return void
     */
    public function paid(Order $order, string $email): void
    {
        // Sends email to the user that the payment has been received.
        $this->orderMailService->paymentReceived($email, $order);
    }


    /**
     * Sens a email to the user that the order is in transit
     * @param \App\Models\Order $order
     * @param string $email
     * @param string $name
     * @return void
     */
    public function transit(Order $order, string $email, string $name): void
    {
        // Sends the transit email to the user
        $this->orderMailService->transit($email, $name, $order);
    }
}
