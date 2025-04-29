<?php

namespace App\Services;

use App\Models\Order;
use App\Helper\Functions;
use App\Http\Controllers\payments\ExhibitionController;
use App\Models\Exhibition;
use App\Models\OrderStatus;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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

        // Removes everything from the users cart and calculates the new inventory
        Functions::itemHandle($this->cart);
    }

    /**
     * Displays a view where the user can choose where to pick there products up.
     */
    public function exhibitions()
    {
        // Checks if there are any exhibitions in the database
        // Updates order and redirects user with error message.
        if (Exhibition::all()->count() == 0) {
            $this->order->update([
                "order_status_id" => OrderStatus::$failed
            ]);

            return redirect()->route("home.index")->with("error", "Er zijn geen beursen op dit moment, probeer een andere betaling.");
        }

        return redirect()->route("payment.exhibition.index")->with('success', 'KANKER DING');
    }
}
