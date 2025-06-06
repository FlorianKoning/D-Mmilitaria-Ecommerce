<?php

namespace App\Services\Dashboard;

use App\Repositories\OrderRepository;
use App\Utils\DateHelper;
use stdClass;

class OrderTileService
{
    public function __construct(
        protected OrderRepository $orderRepository,
        protected DateHelper $dateHelper,
    ){}

    /**
     * Returns an object of the amount of orders this week, percentage difference of this weeks orders and last week orders and the amount of profit this week.
     * @return stdClass
     */
    public function all(): object
    {
        $orders = new stdClass();

        $orders->ordersThisWeek = count($this->orderRepository->thisWeek());
        $orders->percentage = $this->percentage();
        $orders->profit = $this->profit();

        return $orders;
    }

    /**
     * Calculates the difference between the last week orders and this week orders.
     * @return float|int|string
     */
    public function percentage(): string
    {
        $lastWeekDates =$this->dateHelper->lastWeek();
        $lastWeekOrders = count($this->orderRepository->defaultQuery()
            ->whereBetween('orders.created_at', [$lastWeekDates['startOfWeek'], $lastWeekDates['endOfWeek']])->get());
        $thisWeekOrders = count($this->orderRepository->thisWeek());

        $percentage = (($thisWeekOrders - $lastWeekOrders) * 100) / $thisWeekOrders;

        return ($percentage > 0) ? '+'.$percentage : $percentage;
    }

    public function profit(): string
    {
        $profit = 0;
        $thisWeekOrders = $this->orderRepository->thisWeek();

        foreach ($thisWeekOrders as $order) {
            $profit += intval($order->payment_amount);
        }

        if ($profit > 1000) {
            $profit = $profit / 1000;
            $profit = strval(round($profit, 2)).'k';
        }

        return $profit;
    }
}