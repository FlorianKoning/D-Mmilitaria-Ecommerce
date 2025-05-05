<?php

namespace App\Services;

use App\Models\Order;
use App\Repositories\GuestUserRepository;
use App\Repositories\UserRepository;
use App\Utils\ReservedHelper;

class CanceledOrderStatusService
{
    public function __construct(
        protected ReservedHelper $reservedHelper,
        protected OrderMailService $orderMailService,
        protected UserRepository $userRepository,
        protected GuestUserRepository $guestUserRepository,
    ){}

    public function canceled(Order $order): void
    {
        $model = (isset($order['user_id'])) ? $this->userRepository->find($order['user_id']) : $this->guestUserRepository->find($order['guest_user_ud']);
        $email = $model->email;
        $name = "$model->first_name $model->last_name";

        // Removes the items from the reserveProducts.
        $this->reservedHelper->unReserveProduct($order);

        // Sends a email to the user that the order has been canceled.
        $this->orderMailService->canceledOrder($email, $name, $order);
    }
}
