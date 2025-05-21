<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentOption extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentOptionFactory> */
    use HasFactory;

    public static int $bankTranfer = 1;
    public static int $fairPickup = 2;
    public static int $other = 3;


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
        'bank_transfer' => 'Pay with bank transfer.',
        'fair_pickup' => 'Pick up at fair.',
        'other' => 'Other payments',
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
