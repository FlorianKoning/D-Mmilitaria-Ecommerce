<?php

namespace App\Http\Controllers;

use Exception;
use App\Mail\NewOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\PaymentOption;
use App\Services\OrderService;
use Illuminate\Validation\Rule;
use App\Services\PaymentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    /**
     * Handles the payment option, items and payment service.
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function index(Request $request): RedirectResponse
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


        // Checks if redirect is needed. (User already had an order on open)
        if ($order === false) {
            return redirect()->route('checkout.index')->with('shipping', $request->shipping)->with('paymentAmount', $request->paymentAmount)->with('duplicateOrder', 'Weet u zeker dat u deze order wilt plaatsen, u heeft nog een andere order op open status staan.');
        }


        // Sends email That the order has been made.
        Mail::to($request->shipping['email-address'])->queue(
            new NewOrder($order, $request->shipping['first-name'])
        );

        // Checks what payment options has been selected
        $paymentOption = $this->getPaymentOption($request->paymentMethod);

        // Activates the payment
        $paymentService = new PaymentService($order, $paymentOption);
        $paymentService->payment();


        return redirect()->route('home.index');
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


    private function getPaymentOption(?array $paymentMethods): PaymentOption
    {
        // Checks if "nothing" was selected, use default payment option.
        if ($paymentMethods == null) {
            return PaymentOption::find(PaymentOption::$other);
        }


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
