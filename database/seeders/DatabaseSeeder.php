<?php

namespace Database\Seeders;

use App\Models\LandCatagories;
use App\Models\Product_catagory;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Product;
use App\Models\Product_catagorie;
use App\Models\Product_category;
use App\Models\ProductCatagory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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


        // creates the admin user
        User::factory()->create([
            'name' => env('ADMIN_NAME'),
            'email' => env('ADMIN_EMAIL'),
            'password' => Hash::make(env('ADMIN_PASSWORD')),
            'role_id' => 3
        ]);


        // Creates a product
        Product::factory()->create([
            'inventory_number' => 'nederlandsGeweer012025',
            'name' => 'Nederlands geweer uit 1941',
            'small_desc' => 'Nederlands geweer uit 1941 van een nederlandse soldaat.',
            'big_desc' => 'Nederlands geweer uit 1941 van een nederlandse soldaat. Nederlands geweer uit 1941 van een nederlandse soldaat. Nederlands geweer uit 1941 van een nederlandse soldaat.',
            'inventory' => '3',
            'price' => '499.00',
            'main_image' => 'http://127.0.0.1:8080/storage/images/Nederlands-geweer-uit-1941.png',
            'is_active' => true,
            'created_at' => '2025-01-19 21:20:08',
            'updated_at' => '2025-01-19 21:20:08'
        ]);


        // Creates a product with a discount
        Product::factory()->create([
            'inventory_number' => 'uniform012025',
            'name' => 'uniform van nederlandse soldaat',
            'small_desc' => 'uniform van nederlandse soldaat uit 1941.',
            'big_desc' => 'uniform van nederlandse soldaat uit 1941. uniform van nederlandse soldaat uit 1941. uniform van nederlandse soldaat uit 1941.',
            'inventory' => '2',
            'price' => '1699.00',
            'discount_percentage' => '10',
            'discount_start_date' => '2025-01-20',
            'discount_end_date' => '2025-01-27',
            'main_image' => 'http://127.0.0.1:8080/storage/images/uniform-van-nederlandse-soldaat.png',
            'is_active' => true,
            'created_at' => '2025-01-19 21:20:08',
            'updated_at' => '2025-01-19 21:20:08'
        ]);


        // Creates geweren category
        Product_category::factory()->create([
            'name' => 'Geweren',
            'product_id' => 1,
            'created_at' => '2025-01-19 21:19:09',
            'updated_at' => '2025-01-19 21:19:13'
        ]);


        // Creates uniformen category
        Product_category::factory()->create([
            'name' => 'Uniformen',
            'product_id' => 2,
            'created_at' => '2025-01-19 21:19:09',
            'updated_at' => '2025-01-19 21:19:13'
        ]);


        // Creates land categories
        LandCatagories::factory()->create([
            'name' => 'Nederlands',
            'created_at' => '2025-01-19 21:19:09',
            'updated_at' => '2025-01-19 21:19:13'
        ]);


        // Creates land categories
        LandCatagories::factory()->create([
            'name' => 'Duits',
            'created_at' => '2025-01-19 21:19:09',
            'updated_at' => '2025-01-19 21:19:13'
        ]);
    }
}
