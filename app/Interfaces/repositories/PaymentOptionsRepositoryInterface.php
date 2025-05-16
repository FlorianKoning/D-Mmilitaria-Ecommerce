<?php

namespace App\Interfaces\Repositories;

use App\Models\PaymentOption;
use Illuminate\Database\Eloquent\Collection;

interface PaymentOptionsRepositoryInterface
{
    public function all(bool $isNotEmpty = true): Collection;
    public function find(array $paymentOption): PaymentOption;
}
