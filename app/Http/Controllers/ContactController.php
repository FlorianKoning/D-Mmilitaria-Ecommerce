<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
     * @param \Illuminate\Http\Request $request
     * @return never
     */
    public function message(Request $request): RedirectResponse
    {
        dd($request);
    }
}
