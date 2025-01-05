<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'small_desc',
        'big_desc',
        'catagory_id',
        'inventory_id',
        'price',
        'discount_id',
    ];


    /**
     * Get the catagorie associated with the user.
     */
    public function product_category(): HasOne
    {
        return $this->hasOne(product_category::class);
    }


    /**
     * Get the catagorie associated with the user.
     */
    public function product_inventory(): HasOne
    {
        return $this->hasOne(product_inventory::class);
    }
}
