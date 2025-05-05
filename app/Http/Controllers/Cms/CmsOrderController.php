<?php

namespace App\Http\Controllers\Cms;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\GuestUser;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use App\Mail\PaymentReceived;
use App\Models\PaymentOption;
use App\Factories\PaymentFactory;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Factories\OrderStatusFactory;
use Illuminate\Http\RedirectResponse;

class CmsOrderController extends Controller
{
    public function __construct(
        protected OrderStatusFactory $orderStatusFactory,
    ){parent::__construct();}


    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $columnNames = Order::$columnNames;
        $statusColors = Order::$orderColors;
        $orders = Order::select('orders.*', 'users.first_name as userFirstName', 'users.last_name as userLastName',
            'guest_users.first_name as guestFirstname', 'guest_users.last_name as guestLastName', 'order_statuses.status as orderStatusName',
            'payment_name')
            ->leftJoin('users', 'user_id', '=', 'users.id')
            ->leftJoin('guest_users', 'guest_user_id', '=', 'guest_users.id')
            ->leftJoin('order_statuses', 'order_status_id', '=', 'order_statuses.id')
            ->leftJoin('payment_options', 'payment_option_id', '=', 'payment_options.id')
            ->get();

        return view('cms.order.order-index', [
            'orders' => $orders,
            'columnNames' => $columnNames,
            'statusColors' => $statusColors,
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
}
