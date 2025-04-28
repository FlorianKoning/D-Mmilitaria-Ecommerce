<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    /** @use HasFactory<\Database\Factories\ExhibitionFactory> */
    use HasFactory;


    public static $columnNames = [
        'exhibition_name' => 'Beurs Naam',
        'exhibition_location' => 'Beurs Locatie',
        'exhibition_date' => 'Beurs Datum',
        'exhibition_start_time' => 'Beurs Begin Tijd',
        'exhibition_end_time' => 'Beurs Eind Tijd',
        'present' => 'Aanwezig'
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'exhibition_name',
        'exhibition_location',
        'exhibition_date',
        'exhibition_opening_time',
        'exhibition_closing_time',
        'present',
    ];
}
