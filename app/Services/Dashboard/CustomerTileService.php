<?php

namespace App\Services\Dashboard;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Utils\DateHelper;
use stdClass;

class CustomerTileService
{
    public function __construct(
        protected UserRepository $userRepository,
        protected DateHelper $dateHelper,
    ){}

    /**
     * Returns an object of the amount of new customers this week, percentage difference of this weeks custoemrs and last week new customer.
     * @return void
     */
    public function all(): object
    {
        $customers = new stdClass();

        $customers->newCustomers = ($this->userRepository->newUsers() == null) ? 0 : count($this->userRepository->newUsers());
        $customers->percentage = $this->percentage();
        $customers->total = $this->total();

        return $customers;
    }

    public function percentage(): string
    {
        $lastWeekDates =$this->dateHelper->lastWeek();
        $lastWeekOrders = count(User::all()->whereBetween('orders.created_at', [$lastWeekDates['startOfWeek'], $lastWeekDates['endOfWeek']]));
        $thisWeekOrders = ($this->userRepository->newUsers() == null) ? 0 : count($this->userRepository->newUsers());

        $percentage = ($thisWeekOrders != 0) ? (($thisWeekOrders - $lastWeekOrders) * 100) / $thisWeekOrders : 0;

        return ($percentage > 0) ? '+'.$percentage : $percentage;
    }

    public function total(): int
    {
        return count($this->userRepository->all());
    }
}