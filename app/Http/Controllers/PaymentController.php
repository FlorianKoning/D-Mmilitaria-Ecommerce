<?php

namespace App\Http\Controllers;

use App\Models\PaymentOption;
use Exception;
use Illuminate\Http\Request;
use App\Services\OrderService;
use Illuminate\Validation\Rule;
use App\Services\PaymentService;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Handles the payment option, items and payment service.
     * @param \Illuminate\Http\Request $request
     * @return PaymentService
     */
    public function index(Request $request)
    {
        // Validates Shipping information
        $provinceIds = $this->getProvince();
        $request->validate([
            'shipping.email-address' => 'required|email|string|max:191',
            'shipping.phone' => 'required|min:10|',
            'shipping.first-name' => 'required|string|max:191',
            'shipping.last-name' => 'required|string|max:191',
            'shipping.company' => 'nullable|string|max:191',
            'shipping.address' => 'required|string|max:191',
            'shipping.apartment' => 'nullable|number|max:1000',
            'shipping.city' => 'required|string|max:191',
            'shipping.provinces' => 'required|string|'.Rule::in($provinceIds),
            'shipping.postal-code' => 'required|string|min:7'
        ]);

        // Creates a new order with the payment id, items array and the shipping array.
        $order = OrderService::create($request->shipping, $request->items, $request->paymentAmount);

        // Checks what payment options has been selected
        $paymentOption = $this->getPaymentOption($request->paymentMethod);

        // Activates the payment
        $paymentService = new PaymentService($order, $paymentOption);
        $paymentService->payment();
    }

    private function getProvince(): array
    {
        $returnArray = array();
        $provinces = DB::table('provinces')->select('id')->get();

        foreach ($provinces as $province) {
            $returnArray[] = $province->id;
        }

        return $returnArray;
    }


    private function getPaymentOption(array $paymentMethods): PaymentOption
    {
        foreach ($paymentMethods as $key => $checked) {
            if ($checked === "checked") {
                if (PaymentOption::find($key) == null) {
                    throw new Exception('The given payment method does not exist.');
                }

                return PaymentOption::find($key);
            }
        }

        throw new Exception('Something went wrong. No payment option selected or not found');
    }
}
