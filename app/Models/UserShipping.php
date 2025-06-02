<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserShipping extends Model
{
    /** @use HasFactory<\Database\Factories\UserShippingFactory> */
    use HasFactory;

   /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'company',
        'address',
        'apartment',
        'shippingCountry_id',
        'city',
        'postal_code',
        'phone_number',
    ];

    /**
     * Tells laravel that there are no timestamps
     */
    public $timestamps = false;
}
