<?php

namespace App\Http\Controllers;

use App\Models\BusinessSettings;
use Illuminate\Contracts\View\View;

class PublicController extends Controller
{
    /**
     * Displays the about-us page.
    */
   public function aboutUs(): View
   {
        return view("public.about-us");
   }


   /**
    * Displays the terms of services page.
    * @return View
    */
   public function termsOfService(): View
   {
        return view("public.termsOfServices", [
            'business' => BusinessSettings::find(ProfileController::$businessTableId),
        ]);
   }


   public function privacy(): View
   {
        return view('public.privacy', [
            'business' => BusinessSettings::find(ProfileController::$businessTableId),
        ]);
   }
}
