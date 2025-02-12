<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\ShippingRequest;
use App\Models\Province;
use App\Models\Shipping;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
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
            'shipping' => Shipping::where('user_id', Auth::user()->id)->first(),
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
            'province_id' => $validated['provinces'],
            'postal_code' => $validated['postal-code'],
            'phone_number' => $validated['phone']
        ];


        // Checks if a update or create function should be called
        if (Shipping::where('user_id', $userId)->exists()) {
            $shipping = Shipping::where('user_id', $userId)->first();

            $shipping->update($updateArray);
        } else {
            Shipping::create($updateArray);
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
