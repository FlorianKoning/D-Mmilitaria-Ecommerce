<?php

namespace App\Http\Controllers;

use App\Helper\Functions;
use App\Services\AclService;
use App\Services\CartService;
use App\Models\LandCatagoriesLink;
use App\Models\Product_catagoryLink;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

abstract class Controller
{
    protected AclService $aclService;
    protected Functions $functions;
    protected int $cartAmount;
    protected object|null $cart;


    public function __construct()
    {
        $this->aclService = new AclService;
        View::share('aclService', $this->aclService);

        $this->functions = new Functions;
        View::share('functions', $this->functions);

        $this->cartAmount = CartService::count();
        View::share('cartAmount', $this->cartAmount);

        $this->cart = (Auth::check()) ? CartService::get(Auth::user()->id) : json_decode(json_encode(session()->get('cart')), associative: FALSE);
        View::share('cart', $this->cart);
    }
}
