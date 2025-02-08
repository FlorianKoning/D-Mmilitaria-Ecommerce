<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product_catagoryLink extends Model
{
    /** @use HasFactory<\Database\Factories\ProductCatagoryLinkFactory> */
    use HasFactory;


    /**
     * This array can return all the column names and there website ready names
     * @var array
     */
    public static array $columnNames = [
        'product_categories_id' => 'Product Categorie',
        'product_id' => 'Product'
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'product_categories_id',
        'product_id'
    ];


    /**
     * Tells laravel that there are no timestamps
     */
    public $timestamps = false;



    /**
     * Returns all the linked land categories orderd by the land categories name.
     * @param int $id
     * @return \Illuminate\Support\Collection<int, \stdClass>
     */
    public static function findWithJoin(int $id)
    {
        return DB::table('product_catagory_links')
            ->leftJoin('product_categories', 'product_catagory_links.product_categories_id', '=', 'product_categories.id')
            ->where('product_catagory_links.product_id', $id)
            ->orderBy('product_categories.name')
            ->get();
    }


    /**
     * Returns true or false based on if the categorieLink exist
     * @param mixed $categorie_id
     * @param mixed $product_id
     * @return bool
     */
    public static function exists($categorie_id, $product_id): bool
    {
        if (Product_catagoryLink::where('product_categories_id', $categorie_id)->where('product_id', $product_id)->exists()) {
            return true;
        }

        return false;
    }
}
