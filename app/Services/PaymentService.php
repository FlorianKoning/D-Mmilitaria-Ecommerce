<?php

namespace App\Services;

use Exception;
use App\Models\User;
use App\Models\Order;
use App\Models\GuestUser;
use App\Mail\BankTransfer;
use App\Models\PaymentOption;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use App\Interfaces\PaymentServiceInterface;

class PaymentService implements PaymentServiceInterface
{
    protected Order $order;
    protected PaymentOption $paymentOption;
    protected string $name;

    /**
     * Summary of __construct
     * @param \App\Models\Order $order
     * @param \App\Models\PaymentOption $paymentOption
     */
    public function __construct(Order $order, PaymentOption $paymentOption, string $name)
    {
        $this->order = $order;
        $this->paymentOption = $paymentOption;
        $this->name = $name;
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
        $email = ($this->order['user_id'] == null) ? GuestUser::find($this->order['guest_user_id'])->email : User::find($this->order['user_id'])->email;

        // Sends email to the new registered  user
        Mail::to($email)->queue(
            new BankTransfer($this->order, $email, $this->name)
        );

        // Removes everything from the users cart
        $cart = (Auth::check()) ? CartService::get(Auth::user()->id) : session('cart');
        if (!Auth::check()) {
            foreach ($cart as $key => $item) {
                unset($cart[$key]);
            }

            Session::put('cart', $cart);
        } else {
            $cart->delete();
        }


        // Removes the inventory of all the bought items.
        dd($cart);


        return redirect()->route('home.index')->with('bankTransfer', 'Uw bestelling word behandeld, u krijgt een bevestegings mail wanneer we het geld binnen hebben.');
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
