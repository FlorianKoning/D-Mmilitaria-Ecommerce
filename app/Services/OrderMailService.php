<?php

namespace App\Services;

use App\Mail\BankTransfer;
use App\Models\Order;
use App\Mail\NewOrder;
use App\Mail\NewOrderAdmin;
use Illuminate\Support\Facades\Mail;

class OrderMailService
{
    /**
     * Handles all all the emails for when a new order came in
     * @param array $shipping
     * @param \App\Models\Order $order
     * @return void
     */
    public function newOrderHandler(array $shipping, Order $order): void
    {
        $this->newOrder($shipping, $order);
        $this->newOrderAdmin($shipping, $order);
    }


    /**
     * Sends a mail to the user that a new order has been created.
     * @param array $shipping
     * @param \App\Models\Order $order
     * @return void
     */
    public function newOrder(array $shipping, Order $order): void
    {
        Mail::to($shipping['email-address'])->queue(
            new NewOrder($order, $shipping['first-name'])
        );
    }


    /**
     * Sends a mail to the admin that a new order has been made by a user.
     * @param array $shipping
     * @param \App\Models\Order $order
     * @return void
     */
    public function newOrderAdmin(array $shipping, Order $order): void
    {
        Mail::to(env('ADMIN_EMAIL'))->queue(
            new NewOrderAdmin($order, $shipping['first-name'])
        );
    }


    /**
     * Send a mail to the user on how the bank transfer works.
     * @param \App\Models\Order $order
     * @param string $email
     * @param string $name
     * @return void
     */
    public function bankTransfer(Order $order, string $email, string $name): void
    {
        Mail::to($email)->queue(
            new BankTransfer($order, $email, $name)
        );
    }
}
