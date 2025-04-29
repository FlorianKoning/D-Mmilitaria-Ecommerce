<?php

namespace App\Factories;

use App\Services\BankTransferService;
use App\Services\FairPickUpService;
use Exception;
use App\Models\User;
use App\Models\Order;
use App\Models\GuestUser;
use App\Mail\PaymentReceived;
use App\Models\PaymentOption;
use App\Services\CartService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Interfaces\PaymentFactoryInterface;

class PaymentFactory implements PaymentFactoryInterface
{
    protected Order $order;
    protected PaymentOption $paymentOption;
    protected string $name;
    protected string $email;
    protected array|object $cart;

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

        // Sets up the email and cart.
        $this->email = ($this->order['user_id'] == null) ? GuestUser::find($this->order['guest_user_id'])->email : User::find($this->order['user_id'])->email;
        $this->cart = (Auth::check()) ? CartService::get(Auth::user()->id) : session('cart');
    }



    public function payment(): void
    {

    }


    /**
     * Creates a bank transfer payment
     * @return never
     */
    public function backTransfer(): RedirectResponse
    {
        // Calls the bankTransferService.
        $bankTransferService = new BankTransferService($this->email, $this->cart, $this->name, $this->order);
        $bankTransferService->send();


        // Returns the user to the home page.
        return redirect()->route('home.index')->with('bankTransfer', 'Uw bestelling word behandeld, u krijgt een bevestegings mail wanneer we het geld binnen hebben.');
    }


    /**
     * Creates a order for a fair pickup.
     * @return void
     */
    public function fairPickUp(): void
    {
        // Calls the fair pick up service.
        $fairPickUpService = new FairPickUpService($this->email, $this->cart, $this->name, $this->order);
        $fairPickUpService->exhibitions();
    }


    /**
     * Creates other payment using Molli.
     * @return void
     */
    public function other(): RedirectResponse
    {
        //
    }


    /**
     * Sends confirmation email to the user.
     * @param \App\Models\Order $order
     * @return bool
     */
    public static function paymentReceived(Order $order): bool
    {
        $email = (isset($order['user_id'])) ? User::find($order['user_id'])['email'] : GuestUser::find($order['guest_user_id'])['email'];

        // Sends email to the user
        Mail::to($email)->queue(
            new PaymentReceived($order)
        );

        return true;
    }
}
