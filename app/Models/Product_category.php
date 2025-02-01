<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    /** @use HasFactory<\Database\Factories\Product_categoryFactory> */
    use HasFactory;

    /**
     * This array can return all the column names and there website ready names
     * @var array
     */
    public static array $columnNames = [
        'name' => 'Catagorie Naam',
        'product_id' => 'Product'
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'product_id'
    ];
}
