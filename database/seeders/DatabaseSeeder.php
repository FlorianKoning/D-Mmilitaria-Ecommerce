<?php

namespace Database\Seeders;

use App\Models\BusinessSettings;
use App\Models\InvoiceSettings;
use App\Models\LandCatagories;
use App\Models\MailSettings;
use App\Models\Month;
use App\Models\OrderStatus;
use App\Models\PaymentOption;
use App\Models\Role;
use App\Models\ShippingCountry;
use App\Models\User;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\Province;
use App\Utils\ShippingCountries;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Inserts all the default options of database tables.
        $this->defaultOptions();

        // Default payment options.
        $this->defaultPaymentOptions();

        // Creates the default products in the database.
        $this->defaultProducts();

        // Creates the default categories
        $this->defaultCategories();

        // Creates the default invoice settings.
        $this->defaultInvoiceSettings();

        // Sets an empty table for businessTable with an id of 1.
        $this->createBusinessTable();

        $this->createEmailSettings();

        // Sets up all the months in the database.
        $this->setMonths();

        $this->setShippingCountries();
    }


    /**
     * Creates products in the database.
     * @return void
     */
    private function defaultProducts()
    {
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
    }


    /**
     * Creates some default categories
     * @return void
     */
    private function defaultCategories()
    {
         // Creates geweren category
         Product_category::factory()->create([
            'name' => 'Geweren',
            'created_at' => '2025-01-19 21:19:09',
            'updated_at' => '2025-01-19 21:19:13'
        ]);


        // Creates uniformen category
        Product_category::factory()->create([
            'name' => 'Uniformen',
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

    /**
     * Inserts all the default options of database tables.
     * @return void
     */
    private function defaultOptions(): void
    {
        // inserts all the roles
        foreach (Role::$roleArray as $key => $value) {
            Role::factory()->create([
                'name' => $key
            ]);
        }

        // Inserts all the provinces
        foreach (Province::$provinces as $province) {
            Province::factory()->create([
                'province_name' => $province,
            ]);
        }

        // Inserts all the default order statuses
        foreach (OrderStatus::$orderStatusArray as $status) {
            OrderStatus::factory()->create([
                'status' => $status
            ]);
        }

        // creates the admin user
        User::factory()->create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => env('ADMIN_EMAIL'),
            'password' => Hash::make(env('ADMIN_PASSWORD')),
            'role_id' => 3
        ]);
    }

    /**
     * Default payment options.
     * @return void
     */
    private function defaultPaymentOptions(): void
    {
        PaymentOption::factory()->create([
            'payment_name' => 'bank_transfer',
            'shipping' => 'one_week',
            'shipping_cost' => 5.00,
            'extra_service_costs' => false
        ]);

        PaymentOption::factory()->create([
            'payment_name' => 'fair_pickup',
            'shipping' => 'fair_pickup',
            'shipping_cost' => null,
            'extra_service_costs' => false
        ]);

        // PaymentOption::factory()->create([
        //     'payment_name' => 'other',
        //     'shipping' => 'one_week',
        //     'shipping_cost' => 5.00,
        //     'extra_service_costs' => true
        // ]);
    }


    private function defaultInvoiceSettings(): void
    {
        InvoiceSettings::factory()->create([
            'id' => 1,
            'bankaccount_name' => 'Florian Koning',
            'company_name' => 'DBM militaria',
            'phone_number' => '0628424913',
            'address' => 'Hadrianuslaan 15'
        ]);
    }

    /**
     * Creates a empty table for the business settings.
     * @return void
     */
    private function createBusinessTable(): void
    {
        BusinessSettings::factory()->create([
            'business_email' => '',
            'business_phone_number' => '',
            'bankaccount_number' => 'NL60RABO0128258292',
            'kvk_number' => '97008478',
            'btw_number' => '',
            'business_address' => '',
            'business_logo' => 'http://127.0.0.1:8080/storage/images/business_logo.png',
        ]);
    }


    /**
     * Creates a empty table for the email settings.
     * @return void
     */
    private function createEmailSettings(): void
    {
        MailSettings::factory()->create([
            'order_email' => ''
        ]);
    }


    /**
     * Sets all the months in the database.
     * @return void
     */
    private function setMonths(): void
    {
        foreach (Month::$months as $key => $value) {
            Month::factory()->create([
                'name' => $value,
                'month_number' => $key
            ]);
        }

    }

    /**
     * Puts all the shipping countries in the database.
     * @return void
     */
    private function setShippingCountries(): void
    {
        foreach (ShippingCountries::$list as $key => $value) {
            ShippingCountry::create([
                'country_name' => $key,
                'shipping_cost' => $value
            ]);
        }
    }
}
