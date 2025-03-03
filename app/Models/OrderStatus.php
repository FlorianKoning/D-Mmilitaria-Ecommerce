<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    /** @use HasFactory<\Database\Factories\OrderStatusFactory> */
    use HasFactory;

    public static int $open = 1;
    public static int $canceled = 2;
    public static int $pending = 3;
    public static int $authorized = 4;
    public static int $expired = 5;
    public static int $failed = 6;
    public static int $paid = 7;


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
