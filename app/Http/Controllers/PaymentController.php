<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Auth;

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
        // Variables
        $items = (Auth::check()) ? CartService::get(Auth::user()->id) : json_decode(json_encode(session()->get('cart')), associative: FALSE);
        $this->getPaymentOption($request->paymentOption);

        return new PaymentService($items, $this->paymentOption, $request->paymentValue);
    }

    /**
     * Returns the payment option from the request payment option array.
     * @param array $paymentOption
     * @return void
     */
    private function getPaymentOption(array $paymentOption): void
    {
        foreach ($paymentOption as $key => $payment) {
            $this->paymentOption = $key;
        }
    }
}
