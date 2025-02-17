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
                'one_week' => '3 tot 5 werkdagen',
                'fair_pickup' => 'Ophalen bij de aangegeven beurs'
            ],
            'shipping_cost' => [
                '5' => '€5.00 verzond kosten',
                '' => 'Geen verzend kosten'
            ],
            'extra_service_costs' => [
                '1' => 'Extra service kosten'
            ]
        ]
    ];
}
