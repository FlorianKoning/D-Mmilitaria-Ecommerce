<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessSettings;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Repositories\BusinessRepository;
use App\Http\Requests\ContactMessageRequest;
use App\Mail\PurchaseMail;

class PurchaseController extends Controller
{
    public function __construct(
        protected BusinessRepository $businessRepository,
    ){parent::__construct();}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("contact.purchase.index", [
            'business' => $this->businessRepository->all(),
        ]);
    }

    /**
     * Handels the contact email.
     * @param \App\Http\Requests\ContactMessageRequest $request
     * @return RedirectResponse
     */
    public function message(ContactMessageRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $business =  BusinessSettings::find(ProfileController::$businessTableId);

        // Sends email That the order has been made to the customer.
        Mail::to($business->business_email)->queue(
            new PurchaseMail($validated['message'], $validated['email'], $this->businessRepository->all())
        );

        return redirect()->route('contact.index')->with('success','Uw bericht is verstuurd!');
    }
}
