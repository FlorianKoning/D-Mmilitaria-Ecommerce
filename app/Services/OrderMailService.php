<?php

namespace App\Services;

use App\Mail\Transit;
use App\Models\Order;
use App\Mail\Canceled;
use App\Mail\NewOrder;
use App\Mail\BankTransfer;
use App\Mail\NewOrderAdmin;
use App\Mail\PaymentReceived;
use Illuminate\Support\Facades\Mail;
use App\Repositories\BusinessRepository;
use App\Repositories\ShippingRepository;
use App\Interfaces\services\OrderMailServiceInterface;

class OrderMailService implements OrderMailServiceInterface
{
    public function __construct(
        protected BusinessRepository $businessRepository,
    ){}


    /**
     * Handles all all the emails for when a new order came in
     * @param array $shipping
     * @param \App\Models\Order $order
     * @return void
     */
    public function newOrderHandler(array $shipping, Order $order): void
    {
        $this->newOrder($shipping, $order);
        $this->newOrderAdmin($shipping, $order);
    }


    /**
     * Sends a mail to the user that a new order has been created.
     * @param array $shipping
     * @param \App\Models\Order $order
     * @return void
     */
    public function newOrder(array $shipping, Order $order): void
    {
        $shippingRepository = app(ShippingRepository::class);;

        Mail::to($shipping['email-address'])->queue(
            new NewOrder($order,  $shippingRepository->findWithOrder($order), $shipping['first-name'], $this->businessRepository->all())
        );
    }


    /**
     * Sends a mail to the admin that a new order has been made by a user.
     * @param array $shipping
     * @param \App\Models\Order $order
     * @return void
     */
    public function newOrderAdmin(array $shipping, Order $order): void
    {
        Mail::to(env('ADMIN_EMAIL'))->queue(
            new NewOrderAdmin($order, $shipping['first-name'], $this->businessRepository->all())
        );
    }


    /**
     * Send a mail to the user on how the bank transfer works.
     * @param \App\Models\Order $order
     * @param string $email
     * @param string $name
     * @return void
     */
    public function bankTransfer(Order $order, string $email, string $name): void
    {
        Mail::to($email)->queue(
            new BankTransfer($order, $email, $name, $this->businessRepository->all())
        );
    }


    /**
     * Sends a email to the user that the payment has been received.
     * @param string $email
     * @param \App\Models\Order $order
     * @return void
     */
    public function paymentReceived(string $email, Order $order): void
    {
        // Sends email to the user
        Mail::to($email)->queue(
            new PaymentReceived($order, $this->businessRepository->all())
        );
    }


    /**
     * Sends email to the user that the order has been canceled.
     * @param string $email
     * @param \App\Models\Order $order
     * @return void
     */
    public function canceledOrder(string $email, string $name, Order $order): void
    {
        Mail::to($email)->queue(
            new Canceled($order, $name, $this->businessRepository->all())
        );
    }


    /**
     * Sends email to the user that the order has been send.
     * @param string $email
     * @param string $name
     * @param \App\Models\Order $order
     * @return void
     */
    public function transit(string $email, string $name, Order $order): void
    {
        Mail::to($email)->queue(
            new Transit($order, $name)
        );
    }
}
