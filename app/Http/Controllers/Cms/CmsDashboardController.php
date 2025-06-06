<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\CustomerTileService;
use App\Services\Dashboard\OrderTileService;

class CmsDashboardController extends Controller
{
    public function __construct(
        protected OrderTileService $orderTileService,
        protected CustomerTileService $customerTileService,
    ){parent::__construct();}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cms.cms-dashboard', [
            'orders' => $this->orderTileService->all(),
            'customers' => $this->customerTileService->all(),
        ]);
    }
}
