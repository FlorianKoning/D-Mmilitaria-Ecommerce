<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    /** @use HasFactory<\Database\Factories\OrderStatusFactory> */
    use HasFactory;

    // Static array with all available roles
    public static array $orderStatusArray = [
        'open',
        'canceled',
        'pending',
        'authorized',
        'expired',
        'failed',
        'paid'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'status',
    ];

    /**
     * Tells laravel that there are no timestamps
     */
    public $timestamps = false;
}
