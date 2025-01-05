<?php

namespace App\Http\Controllers;

use App\Helper\Functions;
use App\Services\AclService;
use Illuminate\Support\Facades\View;

abstract class Controller
{
    protected AclService $aclService;
    protected Functions $functions;


    public function __construct()
    {
        $this->aclService = new AclService;
        View::share('aclService', $this->aclService);

        $this->functions = new Functions;
        View::share('functions', $this->functions);
    }
}
