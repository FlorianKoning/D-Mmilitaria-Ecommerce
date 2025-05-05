<?php

namespace App\Repositories;

use Exception;
use App\Models\OrderStatus;
use Illuminate\Database\Eloquent\Collection;

class OrderStatusRepository
{
    public function all(): Collection
    {
        $orderStatuses = OrderStatus::all();

        if (!$orderStatuses) {
            throw new Exception("There where no order statuses found in the database. Please contact our support");
        }

        return $orderStatuses;
    }


    public function find($id): OrderStatus
    {
        $orderStatus = OrderStatus::find($id);

        if (!$orderStatus) {
            throw new Exception("There where no order statuses found in the database with that id. Please contact our support");
        }

        return $orderStatus;
    }
}
