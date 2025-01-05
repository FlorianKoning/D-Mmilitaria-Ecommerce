<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /** @use HasFactory<\Database\Factories\RoleFactory> */
    use HasFactory;


    // Static variables to get id of certain roles
    public static int $userId = 1;
    public static int $administrator = 2;
    public static int $superUserId = 3;


    // Static array with all available roles
    public static array $roleArray = [
        'user',
        'administator',
        'super_user'
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    /**
     * Tells laravel that there are no timestamps
     */
    public $timestamps = false;
}
