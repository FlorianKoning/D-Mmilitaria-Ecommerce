<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvoiceSettingsRequest;
use App\Models\InvoiceSettings;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CmsInvoiceController extends Controller
{
    private int $settingsId = 1;


    /**
     * View for the invoice settings
     * @return View
     */
    public function settings(): View
    {
        return view('cms.invoices.invoice-settings', [
            'invoiceSettings' => InvoiceSettings::find(1),
        ]);
    }


    /**
     * Stores the invoice settings to the database
     * @param \App\Http\Requests\InvoiceSettingsRequest $request
     * @return RedirectResponse
     */
    public function storeSettings(InvoiceSettingsRequest $request): RedirectResponse
    {
        $invoiceSettings = InvoiceSettings::find($this->settingsId);
        $validated = $request->validated();

        // Updates the invoice settings
        $invoiceSettings->update([
            'bankaccount_number' => $validated['bankaccount_number'],
            'bankaccount_name' => $validated['bankaccount_name'],
            'company_name' => $validated['company_name'],
            'KVK_number' => $validated['KVK_number'],
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
        ]);

        return redirect()->route('cms.invoice.settings')->with('updateSucces', 'De factuur settings zijn succesvol geupdate.');
    }
}
