<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailSettings extends Model
{
    /** @use HasFactory<\Database\Factories\MailSettingsFactory> */
    use HasFactory;

    public static int $mailSettingsId = 1;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'order_email',
    ];


    /**
     * Tells laravel that there are no order_email
     */
    public $timestamps = false;
}
