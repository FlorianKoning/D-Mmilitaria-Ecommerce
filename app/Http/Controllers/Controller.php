<?php

namespace App\Http\Controllers;

use App\Helper\Functions;
use App\Services\AclService;
use App\Services\CartService;
use App\Models\BusinessSettings;
use App\Services\OrderMailService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Repositories\ProviceRepository;
use App\Repositories\BusinessRepository;
use App\Repositories\ExhibitionRepository;
use App\Repositories\PaymentOptionRepository;

abstract class Controller
{
    protected AclService $aclService;
    protected Functions $functions;
    protected int $cartAmount;
    protected object|null $cart;
    protected string $today;
    protected BusinessSettings $business;

    public function __construct()
    {
        $this->aclService = new AclService;
        View::share('aclService', $this->aclService);

        $this->functions = new Functions;
        View::share('functions', $this->functions);

        $this->cartAmount = CartService::count();
        View::share('cartAmount', $this->cartAmount);

        $this->cart = (Auth::check()) ? CartService::get(Auth::user()->id) : json_decode(json_encode((object) session()->get('cart')), associative: FALSE);
        View::share('cart', $this->cart);

        $this->today = date('Y-m-d');
        View::share('today', $this->today);

        $this->business = BusinessSettings::find(ProfileController::$businessTableId);
        View::share('business', $this->business);
    }
}
