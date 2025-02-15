<?php

namespace App\Services;

use App\Interfaces\PaymentServiceInterface;

class PaymentService implements PaymentServiceInterface
{
    public function paymentController(int $paymentId): void
    {
        dd($paymentId);
    }
}
