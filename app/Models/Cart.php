<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'product_id',
        'user_id',
        'amount'
    ];


    /**
     * Get the catagorie associated with the user.
     */
    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }


    /**
     * Get the catagorie associated with the user.
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
