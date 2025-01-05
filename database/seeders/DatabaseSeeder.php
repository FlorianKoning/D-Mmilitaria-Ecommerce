<?php

namespace Database\Seeders;

use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // inserts all the roles
        foreach (Role::$roleArray as $value) {
            Role::factory()->create([
                'name' => $value
            ]);
        }
    }
}
