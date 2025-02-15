<?php

namespace App\Services;

use App\Interfaces\PaymentServiceInterface;
use Illuminate\Http\RedirectResponse;

class PaymentService implements PaymentServiceInterface
{
    protected array|object $items;
    protected string $paymentOption;
    protected int $value;
    protected array $payments;

    /**
     * Sets up the variables
     * @param array|object $items
     * @param string $paymentOption
     * @param int $value
     */
    public function __construct(array|object $items, string $paymentOption, int $value)
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
        dd('huts');
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
