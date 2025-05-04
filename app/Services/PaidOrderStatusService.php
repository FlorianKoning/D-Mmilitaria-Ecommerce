<?php

namespace App\Services;

use App\Models\Order;
use App\Mail\PaymentReceived;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Mail;
use App\Repositories\GuestUserRepository;

class PaidOrderStatusService
{
    public function __construct(
        protected UserRepository $userRepository,
        protected GuestUserRepository $guestUserRepository,
        protected OrderMailService $orderMailService,
    ){}

    public function paid(Order $order): bool
    {
        $email = (isset($order['user_id'])) ? $this->userRepository->find($order['user_id']) : $this->guestUserRepository->find($order['guest_user_ud']);

        $this->orderMailService->paymentReceived($email, $order);

        return true;
    }
}