<?php

namespace App\Http\Controllers;

use App\Helper\Functions;
use App\Services\AclService;
use App\Services\CartService;
use Illuminate\Support\Facades\View;

abstract class Controller
{
    protected AclService $aclService;
    protected Functions $functions;
    protected int $cartAmount;


    public function __construct()
    {
        $this->aclService = new AclService;
        View::share('aclService', $this->aclService);

        $this->functions = new Functions;
        View::share('functions', $this->functions);

        $this->cartAmount = CartService::count();
        View::share('cartAmount', $this->cartAmount);
    }
}
