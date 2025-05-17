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
use App\Repositories\CartRepository;

class PaymentFactory implements PaymentFactoryInterface
{
    protected Order $order;
    protected PaymentOption $paymentOption;
    protected CartService $cartService;
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
        $this->cartService = app(CartService::class);

        // Sets up the email and cart.
        $this->email = ($this->order['user_id'] == null) ? GuestUser::find($this->order['guest_user_id'])->email : User::find($this->order['user_id'])->email;
        $this->cart = (Auth::check()) ? $this->cartService->get(Auth::user()->id) : session('cart');
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
}
