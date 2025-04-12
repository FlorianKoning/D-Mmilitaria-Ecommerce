<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;


    public static array $columnNames = [
        'order_number' => 'Bestellings Nummer',
        'payment_option_id' => 'Betalings Optie',
        'user_id' => 'Gebruiker',
        'payment_amount' => 'Bedrag Van Bestelling',
        'order_status_id' => 'Status van Bestelling',
        'created_at' => 'Gemaakt Op'
    ];



    public static array $orderColors = [
        'open' => 'bg-blue-600',
        'canceled' => 'bg-sky-500',
        'pending' => 'bg-amber-500',
        'authorized' => 'bg-purple-500',
        'expired' => 'bg-yellow-300',
        'failed' => 'bg-red-600',
        'paid' => 'bg-emerald-400'
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'order_number',
        'payment_option_id',
        'user_id',
        'guest_user_id',
        'order_items',
        'payment_amount',
        'order_status_id'
    ];
}
