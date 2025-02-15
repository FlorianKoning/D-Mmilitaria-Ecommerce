<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentOption extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentOptionFactory> */
    use HasFactory;

    // Static array with all available roles
    public static array $paymentOptionsArray = [
        'bank_transfer',
        'fair_pickup',
        'other',
    ];

    /**
     * Dutch translations for the payment methods.
     * @var array
     */
    public static array $columnTranslations = [
        'bank_transfer' => 'Betalen via bankoverschrijving.',
        'fair_pickup' => 'Ophalen bij een beurs.',
        'other' => 'Anders betalen',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'payment_name',
    ];

    /**
     * Tells laravel that there are no timestamps
     */
    public $timestamps = false;
}
