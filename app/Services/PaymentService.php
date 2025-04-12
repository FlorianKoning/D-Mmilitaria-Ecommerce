<?php

namespace App\Services;

use App\Mail\PaymentReceived;
use Exception;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
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
        $cart = (Auth::check()) ? CartService::get(Auth::user()->id) : session('cart');

        // Sends email to the new registered  user
        Mail::to($email)->queue(
            new BankTransfer($this->order, $email, $this->name)
        );

        // Removes everything from the users cart and calculates the new inventory
        $this->itemHandle($cart);



        return redirect()->route('home.index')->with('bankTransfer', 'Uw bestelling word behandeld, u krijgt een bevestegings mail wanneer we het geld binnen hebben.');
    }


    /**
     * Removes everything from the users cart and calculates the new inventory
     * @param array|object $cart
     * @return bool
     */
    private function itemHandle(array|object $cart): bool
    {
        // Checks if the user is logged in.
        if (!Auth::check()) {
            foreach ($cart as $key => $item) {
                unset($cart[$key]);
            }

            Session::put('cart', $cart);

            return true;
        }

        foreach ($cart as $key => $item) {
            // Deletes the products from the cart
            $cartItem = Cart::where('product_id', $item->product_id)->where('user_id', $item->user_id)->first();
            $cartItem->delete();

            // Removes the inventory from the product based on the order.
            $product = Product::find($item->product_id);
            $product->update([
                'inventory' => $product->inventory - $item->amount
            ]);
        }

        return true;
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
