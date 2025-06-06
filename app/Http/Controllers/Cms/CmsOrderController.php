<?php

namespace App\Http\Controllers\Cms;

use App\Models\Order;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\OrderStatus;
use App\Utils\ControllerOptions;
use Illuminate\Http\Request;
use App\Models\PaymentOption;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Factories\OrderStatusFactory;
use App\Repositories\OrderRepository;
use Illuminate\Http\RedirectResponse;

class CmsOrderController extends Controller
{
    public function __construct(
        protected OrderStatusFactory $orderStatusFactory,
        protected OrderRepository $orderRepository,
    ){parent::__construct();}


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        if (isset($request->option)) {
            $orders = $this->options($request->option);
        }

        return view('cms.order.order-index', [
            'orders' => (isset($orders)) ? $orders : $this->orderRepository->all(false),
            'orderOptions' => ControllerOptions::all(),
            'columnNames' => Order::$columnNames,
            'statusColors' => Order::$orderColors,
            'paymentOptions' => PaymentOption::$columnTranslations
        ]);
    }

    /**
     * Shows the products of the order.
     * @param \App\Models\Order $order
     * @return View
     */
    public function show(Order $order): View
    {
        $orderItems = $this->getOrderItems(json_decode($order['order_items']));

        return view('cms.order.order-view', [
            'order' => $order,
            'orderItems' => $orderItems
        ]);
    }

    /**
     * Shows the shipping information of the order
     * @param \App\Models\Order $order
     * @return View
     */
    public function shipping(Order $order): View
    {
        return view("cms.order.order-shipping", [
            'order' => $order,
            'shipping' => Shipping::where('user_id', Auth::user()->id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order): View
    {
        $orderStatuses = OrderStatus::all();

        return view('cms.order.order-update-status', data: [
            'order' => $order,
            'orderStatuses' => $orderStatuses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order): RedirectResponse
    {
        $request->validate([
            'order_status' => ['required', 'numeric']
        ]);

        // Order status factory
        $this->orderStatusFactory->make($request->order_status, $order);

        // Updates the order
        $order->update([
            'order_status_id' => $request->order_status
        ]);

        return redirect()->route('cms.orders.index')->with('orderUpdated', 'Uw order is succesvol geupdate.');
    }


    /**
     * Creates a useable array for the view.
     * @param array $orderItems
     * @return array<array>
     */
    private function getOrderItems(array $orderItems): array
    {
        $itemsArray = array();
        $count = 0;

        foreach($orderItems as $item) {
            $product = Product::find($item->id);

            $itemsArray[$count]['product'] = $product;
            $itemsArray[$count]['amount'] = $item->amount;

            $count++;
        }

        return $itemsArray;
    }

    private function options(string $option): object
    {
        switch ($option) {
            case 'thisWeek':
                return $this->orderRepository->thisWeek();
            default:
                return $this->orderRepository->thisWeek();
        }
    }
}
