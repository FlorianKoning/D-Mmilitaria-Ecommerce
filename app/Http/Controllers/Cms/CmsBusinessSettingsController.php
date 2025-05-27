<?php

namespace App\Http\Controllers\Cms;

use Illuminate\View\View;
use App\Services\FileService;
use App\Models\BusinessSettings;
use App\Http\Controllers\Controller;
use App\Http\Requests\BusinessRequest;
use App\Repositories\BusinessRepository;

class CmsBusinessSettingsController extends Controller
{
    public function __construct(
        protected BusinessRepository $businessRepository,
    ){parent::__construct();}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view("cms.businessSettings.index", [
            'business' => BusinessSettings::find(BusinessSettings::$businessTableId),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusinessRequest $request)
    {
        $businessSettings = BusinessSettings::find(BusinessSettings::$businessTableId);
        $validated = $request->validated();

        if (isset($validated['business_logo'])) {
            $imageUrl = FileService::imageUpload($validated['business_logo'], 'business_logo');
        }

        $businessSettings->update([
            'business_email' => (isset($validated['business_email'])) ? $validated['business_email'] : $businessSettings->business_email,
            'business_phone_number' => (isset($validated['business_phone_number'])) ? $validated['business_phone_number'] : $businessSettings->business_phone_number,
            'bankaccount_number' => (isset($validated['bankaccount_number'])) ? $validated['bankaccount_number'] : $businessSettings->bankaccount_number,
            'kvk_number' => (isset($validated['kvk_number'])) ? $validated['kvk_number'] : $businessSettings->kvk_number,
            'btw_number' => (isset($validated['btw_number'])) ? $validated['btw_number'] : $businessSettings->btw_number,
            'business_address' => (isset($validated['business_address'])) ? $validated['business_address'] : $businessSettings->business_address,
            'business_logo' => (isset($imageUrl) && $imageUrl != null && strlen($imageUrl) > 0) ? $imageUrl : $businessSettings->business_logo,
        ]);

        return redirect()->route('cms.businessSettings.index')->with('success','De business settings zijn aangepast.');
    }
}
