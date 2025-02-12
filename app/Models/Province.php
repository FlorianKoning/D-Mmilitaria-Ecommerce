<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    /** @use HasFactory<\Database\Factories\ProvinceFactory> */
    use HasFactory;


    /**
     * All the provinces in the netherlands
     * @var array
     */
    public static array $provinces = [
        'groningen',
        'friesland',
        'drenthe',
        'overijssel',
        'flevoland',
        'gelderland ',
        'utrecht',
        'noord-holland',
        'zuid-holland',
        'zeeland',
        'noord-brabant',
        'limburg'
    ];


    /**
     * Tells laravel that there are no timestamps
     */
    public $timestamps = false;
}
