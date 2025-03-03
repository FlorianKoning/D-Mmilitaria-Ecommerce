<?php

namespace App\Services;

use App\Models\Order;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Interfaces\PaymentServiceInterface;
use App\Models\PaymentOption;

class PaymentService implements PaymentServiceInterface
{
    protected Order $order;
    protected PaymentOption $paymentOption;

    /**
     * Summary of __construct
     * @param \App\Models\Order $order
     * @param \App\Models\PaymentOption $paymentOption
     */
    public function __construct(Order $order, PaymentOption $paymentOption)
    {
        $this->order = $order;
        $this->paymentOption = $paymentOption;
    }


    /**
     * This function is used as a controller.
     * Checks what payment function has to be called based on the payment option
     * @return void
     */
    public function payment()
    {
        switch ($this->paymentOption['id']) {
            case 1:
                $this->backTransfer();
                break;
            case 2:
                $this->fairPickUp();
                break;
            case 3:
                $this->other();
                break;
            default:
                throw new Exception('Invalid payment option given.');
        }
    }


    /**
     * Creates a bank transfer payment
     * @return never
     */
    public function backTransfer(): RedirectResponse
    {
        dd($this->order, $this->paymentOption);
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
