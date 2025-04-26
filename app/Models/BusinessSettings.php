<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessSettings extends Model
{
    /** @use HasFactory<\Database\Factories\BusinessSettingsFactory> */
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'business_email',
        'kvk_number',
        'btw_number',
        'business_address'
    ];


    /**
     * Tells laravel that there are no timestamps
     */
    public $timestamps = false;
}
