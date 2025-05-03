<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingRequest;
use App\Models\Order;
use App\Models\Shipping;
use App\Repositories\ProvincesRepository;
use App\Repositories\ShippingRepository;
use Illuminate\Contracts\View\View;

class ShippingController extends Controller
{
    public function __construct(
        protected ShippingRepository $shippingRepository,
        protected ProvincesRepository $provincesRepository,
    ){parent::__construct();}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order): View
    {
        return view("shipping.index", [
            'shipping' => $this->shippingRepository->findWithOrder($order),
            'order' => $order,
            'provinces' => $this->provincesRepository->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShippingRequest $request, Order $order, Shipping $shipping)
    {   
        $validated = $request->validated();

        $shipping->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'company' => $validated['company'],
            'address' => $validated['address'],
            'apartment' => $validated['apartment'],
            'city' => $validated['city'],
            'province_id' => $validated['province_id'],
            'postal_code' => $validated['postal_code'],
            'phone_number' => $validated['phone_number']
        ]);

        return redirect()->route('shipping.edit', [$order->id, $shipping->id])->with('success', 'Uw verzendings informatie is succesvol geupdate');
    }
}
