<?php

namespace App\Repositories;

use Exception;
use App\Models\PaymentOption;

class PaymentOptionRepository
{
    public function find(array $paymentOption)
    {
        // Checks if "nothing" was selected, use default payment option.
        if ($paymentOption == null) {
            return PaymentOption::find(PaymentOption::$other);
        }


        foreach ($paymentOption as $key => $checked) {
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
