<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * This array can return all the column names and there website ready names
     * @var array
     */
    public static array $columnNames = [
        'first_name' => 'Voornaam',
        'last_name' => 'Achternaam',
        'email' => 'Email',
        'role_id' => 'Role',
        'newsletter' => 'Niewsbrief',
        'created_at' => 'Aanmeldings Datum',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role_id',
        'newsletter',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    /**
     * Get the catagorie associated with the user.
     */
    public function role(): HasOne
    {
        return $this->hasOne(Role::class);
    }

    /**
     * Returns the defualt query of users with all the joins.
     * @return Builder<User>
     */
    public static function defaultQuery(): Builder
    {
        return User::query()->select('users.*', 'roles.name as role_name')->leftJoin('roles', 'users.role_id', '=', 'roles.id');
    }
}
