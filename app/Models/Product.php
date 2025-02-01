<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

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
        'main_image',
        'discount_percentage',
        'discount_start_date',
        'discount_end_date',
        'is_active',
    ];


    /**
     * Returns all the products with pagination and removes all the non active products
     */
    public static function getAll(int $paginationAmount): LengthAwarePaginator
    {
        return DB::table('products')
            ->select('*')
            ->paginate($paginationAmount);
    }



    /**
     * Returns all the products with out all the non active products
     */
    public static function frontPage(): Collection
    {
        return DB::table('products')
            ->select('products.*')
            ->where('is_active', 1)
            ->get();
    }
}
