<?php

namespace App\Services;

use App\Models\Order;
use App\Helper\Functions;
use App\Mail\BankTransfer;
use Illuminate\Support\Facades\Mail;
use App\Repositories\BusinessRepository;
use App\Interfaces\PaymentServicesInterface;

class BankTransferService implements PaymentServicesInterface
{
    protected string $email;
    protected array|object $cart;
    protected string $name;
    protected Order $order;

    /**
     * Gets all the needed variables
     * @param string $email
     * @param array|object $cart
     * @param string $name
     * @param \App\Models\Order $order
     */
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
        $businessRepository = app(BusinessRepository::class);

        // Send mail to the payer.
        Mail::to($this->email)->queue(
            new BankTransfer($this->order, $this->email, $this->name, $businessRepository->all())
        );
    }
}
