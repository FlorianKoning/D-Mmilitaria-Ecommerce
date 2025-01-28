<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFeatureFactory> */
    use HasFactory;


    /**
     * This array can return all the column names and there website ready names
     * @var array
     */
    public static array $columnNames = [
        'feature' => 'Name van de feature',
        'product_id' => 'Gekoppelde Product',
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'feature',
        'product_id',
    ];


    /**
     * Tells laravel that there are no timestamps
     */
    public $timestamps = false;
}
