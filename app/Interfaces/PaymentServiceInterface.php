<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface PaymentServiceInterface
{
    public function paymentController(int $paymentId): void;
}
