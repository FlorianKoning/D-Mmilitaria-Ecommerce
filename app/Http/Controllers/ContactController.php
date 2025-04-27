<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\BusinessSettings;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ContactMessageRequest;

class ContactController extends Controller
{
    /**
     * Displays the contact form and information.
     */
    public function index(): View
    {
        return view('contact.contact-index', []);
    }


    /**
     * Displays the return policy information.
     */
    public function returnPolicy(): View
    {
        return view('contact.return-index', []);
    }


    /**
     * Handels the contact email.
     * @param \App\Http\Requests\ContactMessageRequest $request
     * @return void
     */
    public function message(ContactMessageRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $business = BusinessSettings::find(ProfileController::$businessTableId);

        // Sends email That the order has been made to the customer.
        Mail::to($business->business_email)->queue(
            new ContactMail($validated['message'], $validated['email'])
        );

        return redirect()->route('contact.index')->with('success','Uw bericht is verstuurd!');
    }
}
