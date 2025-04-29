<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

interface PaymentFactoryInterface
{
    public function backTransfer(): RedirectResponse;
    public function fairPickUp(): void;
    public function other(): RedirectResponse;
}
