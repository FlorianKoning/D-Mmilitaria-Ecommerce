<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    /** @use HasFactory<\Database\Factories\ProductImageFactory> */
    use HasFactory;


    /**
     * This array can return all the column names and there website ready names
     * @var array
     */
    public static array $columnNames = [
        'preview' => 'Foto Preview',
        'image_name' => 'Naam van de foto',
        'product_id' => 'Gekoppelde Product',
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'image_name',
        'image_url',
        'product_id',
    ];


    /**
     * Tells laravel that there are no timestamps
     */
    public $timestamps = false;
}
