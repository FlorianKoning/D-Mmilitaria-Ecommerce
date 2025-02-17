<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Auth;
use stdClass;

class PaymentController extends Controller
{
    private $paymentOption;

    /**
     * Handels the payment option, items and payment service.
     * @param \Illuminate\Http\Request $request
     * @return PaymentService
     */
    public function index(Request $request)
    {
        dd($request);
    }
}
