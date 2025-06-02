<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCountry extends Model
{
    /** @use HasFactory<\Database\Factories\ShippingCountryFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'country_name',
        'shipping_cost',
    ];

    /**
     * Tells laravel that there are no timestamps
     */
    public $timestamps = false;
}
