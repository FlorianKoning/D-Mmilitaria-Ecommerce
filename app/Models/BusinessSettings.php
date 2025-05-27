<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessSettings extends Model
{
    /** @use HasFactory<\Database\Factories\BusinessSettingsFactory> */
    use HasFactory;

    public static int $businessTableId = 1;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'business_email',
        'business_phone_number',
        'bankaccount_number',
        'kvk_number',
        'btw_number',
        'business_address',
        'business_logo'
    ];


    /**
     * Tells laravel that there are no timestamps
     */
    public $timestamps = false;
}
