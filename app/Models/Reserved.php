<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserved extends Model
{
    /** @use HasFactory<\Database\Factories\ReservedFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'product_id',
        'order_id',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reserved';
}
