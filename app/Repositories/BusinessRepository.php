<?php

namespace App\Repositories;

use Exception;
use App\Models\BusinessSettings;
use App\Http\Controllers\ProfileController;

class BusinessRepository
{
   /**
    * Returns all the business settings form the database.
    * @throws \Exception
    * @return \Illuminate\Database\Eloquent\Builder<BusinessSettings>
    */
   public function all(): BusinessSettings
   {
        $business = BusinessSettings::find(ProfileController::$businessTableId);

        if (!$business) {
            throw new Exception('There where no business settings, please inform our team and try again later!');
        }

        return $business;
   }
}
