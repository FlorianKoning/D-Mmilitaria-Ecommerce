<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\BusinessSettings;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ContactMessageRequest;
use App\Repositories\BusinessRepository;

class ContactController extends Controller
{
    public function __construct(
        protected BusinessRepository $businessRepository,
    ){parent::__construct();}

    /**
     * Displays the contact form and information.
     */
    public function index(): View
    {
        return view('contact.contact-index', [
            'business' => $this->businessRepository->all(),
        ]);
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
            new ContactMail($validated['message'], $validated['email'], $this->businessRepository->all())
        );

        return redirect()->route('contact.index')->with('success','Uw bericht is verstuurd!');
    }
}
