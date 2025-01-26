<?php

namespace App\Helper;

use App\Models\LatestUpdate;
use Illuminate\Support\Facades\DB;

class Functions
{
    /**
     * Checks if the request uri contains the given string and returns the given true and false values
     * @return string
     */
    public static function requestUriCheck(string $contains, string $trueValue, string $falseValue): string
    {
        return str_contains($_SERVER['REQUEST_URI'], $contains) ? $trueValue : $falseValue;
    }



    /**
     * This function should be called when a product is created or updated.
     * This will add a new timestamp to the database table and will be showcased on the frontpage.
     * @return void
     */
    public static function storeLatestUpdate(): void
    {
        LatestUpdate::create();
    }


    /**
     * This function should be called when you want the latest "latest update" for the front-end.
     * This will return the latest "latest update".
     * @return string|null
     */
    public static function getLatestupdate(): string|null
    {
        // Checks if the datatbase table is empty.
        if (LatestUpdate::exists()) {
            return date('d-m-Y', strtotime(DB::table('latest_updates')->orderBy('created_at', 'desc')->first()->created_at));
        }


        // Returns null when the database table is empty.
        return null;
    }
}
