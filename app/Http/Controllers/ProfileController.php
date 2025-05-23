<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Province;
use App\Models\Shipping;
use Illuminate\View\View;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use App\Services\FileService;
use App\Models\BusinessSettings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BusinessRequest;
use App\Http\Requests\ShippingRequest;
use App\Repositories\ShippingRepository;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\UserShipping;
use App\Repositories\OrderStatusRepository;
use App\Services\OrderStatusService;

class ProfileController extends Controller
{
    public static int $businessTableId = 1;

    public function __construct(
        protected ShippingRepository $shippingRepository,
        protected OrderStatusService $orderStatusService,
        protected OrderStatusRepository $orderStatusRepository,
    ){parent::__construct();}

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'business' => BusinessSettings::find(self::$businessTableId),
        ]);
    }


    /**
     * Displays the user's shipping form.
     * @return \Illuminate\Contracts\View\View
     */
    public function shipping(): View
    {
        return view('profile.shipping', [
            'provinces' => Province::select('*')->orderBy('province_name')->get(),
            'shipping' => UserShipping::where('user_id', Auth::user()->id)->first(),
        ]);
    }


    /**
     * Displays all the orders of the logged in user.
     * @return void
     */
    public function orders(): View
    {
        $shippingStatusArray = [
            OrderStatus::$open,
            OrderStatus::$pending,
            OrderStatus::$authorized
        ];

        return view('profile.orders', [
            'orders' => Order::getUserOrder(Auth::user()->id),
            'shippingRepository' => $this->shippingRepository,
            'productModel' => new Product(),
            'shippingStatusArray' => $shippingStatusArray,
            'orderStatusColor' => Order::$orderColors,
            'orderStatusRepository' => $this->orderStatusRepository,
        ]);
    }



    /**
     * Stores and updates the shipping information of the user.
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function shippingStore(ShippingRequest $request): RedirectResponse
    {
        $validated  = $request->validated();
        $userId = Auth::user()->id;

        $updateArray = [
            'user_id' => $userId,
            'first_name' => $validated['first-name'],
            'last_name' => $validated['last-name'],
            'company' => $validated['company'],
            'address' => $validated['address'],
            'apartment' => $validated['apartment'],
            'city' => $validated['city'],
            'country' => (isset($validated['country']) ? $validated['country'] : 'Netherlands'),
            'postal_code' => $validated['postal-code'],
            'phone_number' => $validated['phone']
        ];

        // Checks if a update or create function should be called
        if (UserShipping::where('user_id', $userId)->exists()) {
            $userShipping = UserShipping::where('user_id', $userId)->first();

            $userShipping->update($updateArray);
        } else {
            UserShipping::create($updateArray);
        }

        // Returns the user back to the shipping form.
        return redirect()->route('profile.shipping')->with('shippingSucces', 'Uw verzendings informatie is opgeslagen.');
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    /**
     * Updates the business settings of the application
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function business(BusinessRequest $request): RedirectResponse
    {
        $businessSettings = BusinessSettings::find(self::$businessTableId);
        $validated = $request->validated();

        if (isset($validated['business_logo'])) {
            $imageUrl = FileService::imageUpload($validated['business_logo'], 'business_logo');
        }

        $businessSettings->update([
            'business_email' => (isset($validated['business_email'])) ? $validated['business_email'] : $businessSettings->business_email,
            'bankaccount_number' => (isset($validated['bankaccount_number'])) ? $validated['bankaccount_number'] : $businessSettings->bankaccount_number,
            'kvk_number' => (isset($validated['kvk_number'])) ? $validated['kvk_number'] : $businessSettings->kvk_number,
            'btw_number' => (isset($validated['btw_number'])) ? $validated['btw_number'] : $businessSettings->btw_number,
            'business_address' => (isset($validated['business_address'])) ? $validated['business_address'] : $businessSettings->business_address,
            'business_logo' => (isset($imageUrl) && $imageUrl != null && strlen($imageUrl) > 0) ? $imageUrl : $businessSettings->business_logo,
        ]);

        return redirect()->route('profile.edit')->with('status','profile-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
