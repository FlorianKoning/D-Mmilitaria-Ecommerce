<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

interface PaymentServiceInterface
{
    public function backTransfer(): RedirectResponse;
    public function fairPickUp(): RedirectResponse;
    public function other(): RedirectResponse;
}
