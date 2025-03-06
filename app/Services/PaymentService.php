<?php

namespace App\Services;

use App\Mail\NewOrder;
use Exception;
use App\Models\User;
use App\Models\Order;
use App\Models\GuestUser;
use App\Models\PaymentOption;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Interfaces\PaymentServiceInterface;

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
        // Checks what function has to be called based on the payment option.
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
        $email = ($this->order['user_id'] == null) ? GuestUser::find($this->order['guest_user_id'])->email : User::find($this->order['user_id'])->email;
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
