<?php

namespace App\Services;

use App\Models\Order;
use App\Helper\Functions;
use App\Models\Exhibition;
use App\Models\OrderStatus;
use App\Interfaces\PaymentServicesInterface;

class FairPickUpService implements PaymentServicesInterface
{
    protected string $email;
    protected array|object $cart;
    protected string $name;
    protected Order $order;

    public function __construct(string $email, array|object $cart, string $name, Order $order)
    {
        $this->email = $email;
        $this->cart = $cart;
        $this->name = $name;
        $this->order = $order;
    }

    /**
     * Sends a mail to the user and handles the removal of the cart items and inventory items.
     * @return bool
    */
    public function send(): void
    {
        // Send mail to the payer.
        // Mail::to($this->email)->queue(
        //     new BankTransfer($this->order, $this->email, $this->name)
        // );
    }
}
