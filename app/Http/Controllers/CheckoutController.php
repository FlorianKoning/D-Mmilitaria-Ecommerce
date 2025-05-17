<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Shipping;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\PaymentOption;
use App\Services\CartService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helper\Translate\TranslatePaymentOption;
use Illuminate\Http\RedirectResponse;

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
            'shippingInfo' => (Auth::check()) ? Shipping::where('user_id', Auth::user()->id)->first() : null,
            'provinces' => Province::select('*')->orderBy('province_name')->get(),
            'paymentValue' => $request->paymentValue,
            'cart' => $cart,
            'paymentOptions' => PaymentOption::all(),
            'paymentOptionTranslation' => TranslatePaymentOption::$translate
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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
