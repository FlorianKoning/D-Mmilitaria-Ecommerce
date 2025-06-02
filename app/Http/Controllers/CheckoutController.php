<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\View\View;
use App\Models\UserShipping;
use Illuminate\Http\Request;
use App\Models\PaymentOption;
use App\Services\CartService;
use App\Models\ShippingCountry;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Helper\Translate\TranslatePaymentOption;

class CheckoutController extends Controller
{
    public function __construct(
        protected CartService $cartService
    ){parent::__construct();}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|RedirectResponse
    {
        $cart = (Auth::check()) ? $this->cartService->get(Auth::user()->id) : json_decode(json_encode(session()->get('cart')), associative: FALSE);


        // Checks if the cart is empty
        if ($cart == null) {
            return redirect()->route('cart.index')->with('noItems', 'Je kunt niet betalen met geen producten in je winkelmandje');
        }


        // Checks one of the items in the cart has a inventory of 0
        if($this->inventoryCheck($cart) === false) {
            return redirect()->route('cart.index')->with('noInventory', 'Er is iets fout gegaan, de inventory of dit product is 0.');
        }


        return view('checkout.checkout-index', [
            'shippingInfo' => (Auth::check()) ? UserShipping::where('user_id', Auth::user()->id)->first() : null,
            'provinces' => Province::select('*')->orderBy('province_name')->get(),
            'paymentValue' => $request->paymentValue,
            'cart' => $cart,
            'countries' => ShippingCountry::all(),
            'paymentOptions' => PaymentOption::all(),
            'paymentOptionTranslation' => TranslatePaymentOption::$translate
        ]);
    }


    // Checks if an item in the shopping cart has a inventory of 0
    private function inventoryCheck($cart): bool
    {
        foreach ($cart as $item) {
            if ($item->inventory === 0) {
                return false;
            }
        }

        return true;
    }
}
