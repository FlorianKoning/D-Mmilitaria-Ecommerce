<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

interface PaymentFactoryInterface
{
    public function backTransfer(): void;
}
