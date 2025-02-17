<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Interfaces\PaymentServiceInterface;

class PaymentService implements PaymentServiceInterface
{
    protected object $items;
    protected string $paymentOption;
    protected int $value;
    protected array $payments;

    /**
     * Sets up the variables
     * @param object $items
     * @param string $paymentOption
     * @param int $value
     */
    public function __construct(object $items, string $paymentOption, int $value)
    {
        $this->items = $items;
        $this->paymentOption = $paymentOption;
        $this->value = $value;
        $this->payments = [
            'bank_transfer' => $this->backTransfer(),
            'fair_pickup' => $this->fairPickUp(),
            'other' => $this->other()
        ];
    }

    /**
     * Gets used as a controller method.
     * Calls the associated function from the payment method.
     * @return void
     */
    public function __invoke(): void
    {
        $this->payments[$this->paymentOption];
    }

    /**
     * Creates a bank transfer payment
     * @return never
     */
    public function backTransfer(): RedirectResponse
    {
        // Sets up the new order.
         $order = new OrderService(Auth::user()->id, $this->value, $this->items);

        // Creates the new order
    }

    /**
     * Creates a order for a fair pickup.
     * @return void
     */
    public function fairPickUp(): RedirectResponse
    {
        //
    }

    /**
     * Creates other payment using molli.
     * @return void
     */
    public function other(): RedirectResponse
    {
        //
    }
}
