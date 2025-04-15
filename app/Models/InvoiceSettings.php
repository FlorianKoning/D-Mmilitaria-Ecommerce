<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceSettings extends Model
{
    /** @use HasFactory<\Database\Factories\InvoiceSettingsFactory> */
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'bankaccount_number',
        'bankaccount_name',
        'company_name',
        'KVK_number',
        'phone_number',
        'address',
    ];


    /**
     * Tells laravel that there are no timestamps
     */
    public $timestamps = false;
}
