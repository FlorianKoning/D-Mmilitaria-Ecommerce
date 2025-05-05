<?php 

namespace App\Factories;

use App\Interfaces\Factories\OrderStatusFactoryInterface;
use App\Models\Order;
use App\Services\CanceledOrderStatusService;
use App\Services\PaidOrderStatusService;
use Exception;

class OrderStatusFactory implements OrderStatusFactoryInterface
{
    public function __construct(
        protected PaidOrderStatusService $paidOrderStatusService,
        protected CanceledOrderStatusService $canceledOrderStatusService,
    ){}

    /**
     * Checks what the order status and calls the right service.
     * @param string $orderStatus
     * @return never
     */
    public function make(string $orderStatus, Order $order): void
    {
        switch ($orderStatus) {
            case '1':
                //
                break;
            case '2':
                $this->canceledOrderStatusService->canceled($order);
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
                $this->paidOrderStatusService->paid($order);
                break;
            case '8':
                //
                break;
            case '9':
                //
                break;
            default:
                throw new Exception("Something went wrong, order status does not match with the database.");
        }
    }
}