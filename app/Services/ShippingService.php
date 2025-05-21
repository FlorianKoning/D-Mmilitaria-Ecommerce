<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Shipping;
use App\Interfaces\services\ShippingServiceInterface;
use App\Repositories\GuestUserRepository;
use App\Repositories\UserRepository;

class ShippingService implements ShippingServiceInterface
{
    public function __construct(
        protected UserRepository $userRepository,
        protected GuestUserRepository $guestUserRepository,
    ){}

    /**
     * Creates a new shipping instance in the database.
     * @param array $shipping
     * @param \App\Models\Order $order
     * @return Shipping
     */
    public function create(array $shipping, Order $order): Shipping
    {
        if (isset($order->user_id)) {
            $user = $this->userRepository->find($order->user_id);
        } else {
            $guestUser = $this->guestUserRepository->find($order->guest_user_id);
        }

        // Sets the default country to the netherlands
        if ($shipping['country'] == null) {
            $shipping['country'] = 'Netherlands';
        }

        $shipping = Shipping::create([
            'user_id' => (isset($user)) ? $user->id : null,
            'guest_user_id' => (isset($guestUser)) ? $guestUser->id : null,
            'order_id' => $order->id,
            'first_name' => $shipping['first-name'],
            'last_name' => $shipping['last-name'],
            'company' => $shipping['company'],
            'address' => $shipping['address'],
            'apartment' => $shipping['apartment'],
            'country' => $shipping['country'],
            'city' => $shipping['city'],
            'postal_code' => $shipping['postal-code'],
            'phone_number' => $shipping['phone'],
        ]);

        return $shipping;
    }
}
