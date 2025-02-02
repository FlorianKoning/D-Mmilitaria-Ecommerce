<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandCatagoriesLink extends Model
{
    /** @use HasFactory<\Database\Factories\LandCatagoriesLinkFactory> */
    use HasFactory;


    /**
     * This array can return all the column names and there website ready names
     * @var array
     */
    public static array $columnNames = [
        'land_catagory_id' => 'Land Categorie',
        'product_id' => 'Product'
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'land_catagory_id',
        'product_id'
    ];


    /**
     * Tells laravel that there are no timestamps
     */
    public $timestamps = false;
}
