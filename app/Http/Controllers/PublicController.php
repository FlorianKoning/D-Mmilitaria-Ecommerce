<?php

namespace App\Http\Controllers;

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
        return view("public.termsOfServices");
   }
}
