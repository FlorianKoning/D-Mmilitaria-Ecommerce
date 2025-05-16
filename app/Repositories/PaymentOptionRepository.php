<?php

namespace App\Repositories;

use Exception;
use App\Models\PaymentOption;
use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\Repositories\PaymentOptionsRepositoryInterface;

class PaymentOptionRepository implements PaymentOptionsRepositoryInterface
{
    /**
     * Returns all payment options from the database.
     * @param bool $isNotEmpty
     * @throws \Exception
     * @return Collection<int, PaymentOption>
     */
    public function all(bool $isNotEmpty = true): Collection
    {
        $paymentOptions = PaymentOption::all();

        if (count($paymentOptions) == 0 && $isNotEmpty) {
            throw new Exception("There where no payment options found in the database!");
        }

        return $paymentOptions;
    }


    /**
     * Looks through the database to find the right payment option.
     * @param array $paymentOption
     * @throws \Exception
     * @return \Illuminate\Database\Eloquent\Builder<PaymentOption>|\Illuminate\Database\Eloquent\Collection<int, PaymentOption>
     */
    public function find(array $paymentOption): PaymentOption
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
