<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Pagination\LengthAwarePaginator;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;


    /**
     * This array can return all the column names and there website ready names
     * @var array
     */
    public static array $columnNames = [
        'inventory_number' => 'Inventory Nummer',
        'small_desc' => 'Kleine Beschrijving',
        'inventory' => 'Inventory',
        'price' => 'Price',
        'discount_percentage' => 'Kortings percentage',
        'discount_start_date' => 'Kortings start datum',
        'discount_end_date' => 'Kortings eind datum',
        'is_active' => 'Is Actief',
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'inventory_number',
        'name',
        'small_desc',
        'big_desc',
        'catagory_id',
        'inventory',
        'price',
        'product_image_url',
        'discount_percentage',
        'discount_start_date',
        'discount_end_date',
        'is_active',
    ];


    /**
     * Get the catagorie associated with the user.
     */
    public function product_category(): HasOne
    {
        return $this->hasOne(product_category::class);
    }


    /**
     * Returns all the products with pagination and removes all the non active products
     * @return void
     */
    public static function getAll(int $paginationAmount): LengthAwarePaginator
    {
        return DB::table('products')
            ->select('*')
            ->paginate($paginationAmount);
    }
}
