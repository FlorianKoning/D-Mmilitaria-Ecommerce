<?php 

namespace App\Factories;

use App\Interfaces\Factories\OrderStatusFactoryInterface;
use App\Models\Order;
use App\Repositories\GuestUserRepository;
use App\Repositories\UserRepository;
use App\Services\OrderStatusService;
use App\Services\PaidOrderStatusService;
use App\Services\TransitOrderStatusService;
use Exception;

class OrderStatusFactory implements OrderStatusFactoryInterface
{
    public function __construct(
        protected OrderStatusService $orderStatusService,
        protected UserRepository $userRepository,
        protected GuestUserRepository $guestUserRepository,
    ){}

    /**
     * Checks what the order status and calls the right service.
     * @param string $orderStatus
     * @return never
     */
    public function make(string $orderStatus, Order $order): void
    {
        $model = (isset($order['user_id'])) ? $this->userRepository->find($order['user_id']) : $this->guestUserRepository->find($order['guest_user_ud']);
        $email = $model->email;
        $name = "$model->first_name $model->last_name";

        switch ($orderStatus) {
            case '1':
                //
                break;
            case '2':
                $this->orderStatusService->canceled($order, $email, $name);
                break;
            case '3':
                //
                break;
            case '4':
                //
                break;
            case '5':
                //
                break;
            case '6':
                //
                break;
            case '7':
                $this->orderStatusService->paid($order, $email);
                break;
            case '8':
                $this->orderStatusService->transit($order, $email, $name);
                break;
            case '9':
                //
                break;
            default:
                throw new Exception("Something went wrong, order status does not match with the database.");
        }
    }
}