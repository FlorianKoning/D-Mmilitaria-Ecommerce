<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PaymentOption;
use App\Models\BusinessSettings;
use App\Models\Product;
use App\Models\Shipping;
use App\Repositories\GuestUserRepository;
use App\Repositories\UserRepository;
use App\Services\OrderService;
use Illuminate\Contracts\View\View;

class PublicController extends Controller
{
    public function __construct(
        protected UserRepository $userRepository,
        protected GuestUserRepository $guestUserRepository,
        protected OrderService $orderService,
    ){parent::__construct();}


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


   public function confirmation(Order $order, Shipping $shipping): View
   {
        return view('public.confirmation', [
            'order' => $order,
            'shipping' => $shipping,
            'productModel' => new Product(),
            'user' => (isset($order->user_id)) ? $this->userRepository->find($order->user_id) : $this->guestUserRepository->find($order->guest_user_id),
            'itemAmount' => $this->orderService->itemAmount($order->order_items),
        ]);
   }
}
