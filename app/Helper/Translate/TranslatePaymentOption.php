<?php

namespace App\Helper\Translate;

use App\Http\Controllers\Controller;

class TranslatePaymentOption extends Controller
{
    public static array $translate = [
        'nl' => [
            'payment_name' => [
                'bank_transfer' => 'Bankoverschrijving',
                'fair_pickup' => 'Op halen bij beurs',
                'other' => 'Andere betalingen (Molli)'
            ],
            'shipping' => [
                'one_week' => 'Will be shipped to your given home address',
                'fair_pickup' => 'Ophalen bij de aangegeven beurs'
            ],
            'shipping_cost' => [
                '5' => '€5.00 verzond kosten',
                '' => 'Geen verzend kosten'
            ],
            'extra_service_costs' => [
                '1' => 'Extra service kosten'
            ]
        ],
        'en'=> [
            'payment_name' => [
                'bank_transfer' => 'Bank Transfer',
                'fair_pickup' => 'Pick up at a fair',
                'other' => 'Other payment (Molli)'
            ],
            'shipping' => [
                'one_week' => 'Transfer funds directly to our bank account',
                'fair_pickup' => 'Pick up at chosen fair'
            ],
            'shipping_cost' => [
                '5' => '€5.00 shipping cost',
                '' => 'No shipping cost'
            ],
            'extra_service_costs' => [
                '1' => 'Extra service cost'
            ]
        ],
    ];
}
