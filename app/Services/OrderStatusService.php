<?php

namespace App\Services;

use App\Repositories\OrderStatusRepository;

class OrderStatusService
{
    public function __construct(
        protected OrderStatusRepository $orderStatusRepository,
    ){}
}
