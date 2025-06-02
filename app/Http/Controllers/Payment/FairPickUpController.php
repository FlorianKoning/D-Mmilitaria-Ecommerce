<?php

namespace App\Http\Controllers\Payment;

use App\Factories\PaymentFactory;
use App\Models\Order;
use App\Helper\Functions;
use App\Models\Exhibition;
use App\Repositories\ShippingRepository;
use App\Services\OrderMailService;
use Exception;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\PaymentOption;
use App\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use App\Repositories\BusinessRepository;
use App\Repositories\GuestUserRepository;
use App\Repositories\ExhibitionRepository;
use App\Repositories\PaymentOptionRepository;

class FairPickUpController extends Controller
{
    public function __construct(
        protected BusinessRepository $businessRepository,
        protected ExhibitionRepository $exhibitionRepository,
        protected OrderMailService $orderMailService,
    ){parent::__construct();}

    /**
     * Returns a view with all the available exhibitions.
     * Here the user will chose at what exhibition to pick up the order.
     * @param \App\Models\Order $order
     * @return RedirectResponse|View
     */
    public function exhibition(Order $order): View|RedirectResponse
    {
        try {
            $exhibitions = $this->exhibitionRepository->all($order);
        } catch (Exception $exception) {
            return redirect()->route('checkout.index')->withErrors([
                'paymentOptions' => 'Error: '.$exception->getMessage(),
            ]);
        }

        return view("payments.fairPickUp", [
            'exhibitions' => $exhibitions,
            'business' => $this->businessRepository->all(),
            'order' => $order,
        ]);
    }


    /**
     * Returns a view with the available payment methods for the fair pick up.
     * @param \App\Models\Order $order
     * @return void
     */
    public function choicePayment(Exhibition $exhibition, Order $order): View
    {
        $paymentOptionsRepository = new PaymentOptionRepository();

        return view("payments.fair-pickup-payment", [
            'order' => $order,
            'exhibition' => $exhibition,
        ]);
    }


    /**
     * Handles the given payment option.
     * @param \App\Models\Exhibition $exhibition
     * @param \App\Models\Order $order
     * @param \App\Models\PaymentOption $paymentOption
     * @return void
     */
    public function payment(Exhibition $exhibition, Order $order, PaymentOption $paymentOption): RedirectResponse
    {
        $userRepository = new UserRepository();
        $guestUserRepository = new GuestUserRepository();

        $user = ($order->user_id != null) ? $userRepository->find($order->user_id) : $guestUserRepository->find($order->guest_user_id);
        $email = $user->email;
        $name = "$user->first_name $user->last_name";

        switch ($paymentOption->id) {
            case '1':
                $this->orderMailService->bankTransfer($order, $email, $name);
                break;
            default:
                throw new Exception("The chosen payment option does not exist!");
                break;
        }

        return redirect()->route('payment.fairPickUp', [$exhibition->id, $order->id]);
    }


    /**
     * Gets the chosen exhibition from the view and the corresponding order.
     * @param \App\Models\Exhibition $exhibition
     * @param \App\Models\Order $orders
     * @return never
     */
    public function fairPickUp(Exhibition $exhibition, Order $order): RedirectResponse
    {
        $shippingRepository = new ShippingRepository();
        $shipping = $shippingRepository->findWithOrder($order);

        // Updates the order exhibition_id to the new value.
        $order->update([
            'exhibition_id' => $exhibition->id,
        ]);

        // Sends the user to a "thank you" page.
        return redirect()->route('public.confirmation', [$order, $shipping])->with('bankTransfer', 'Uw bestelling word behandeld, u krijgt een bevestegings mail wanneer we het geld binnen hebben.');
    }
}
