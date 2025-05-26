<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\CmsEmailSettingsRequest;
use App\Models\MailSettings;
use App\Repositories\UserRepository;

class EmailSettingsController extends Controller
{
    public function __construct(

    ){parent::__construct();}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view("cms.email.index", [
            'emailSettings' => MailSettings::find(MailSettings::$mailSettingsId),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CmsEmailSettingsRequest $request)
    {
        $validated = $request->validated();
        $mailSettings = MailSettings::find(MailSettings::$mailSettingsId);

        $mailSettings->update([
            'order_email' => $validated['order_email'],
        ]);

        return redirect()->route('cms.emailSettings.index')->with('success', 'Je email settings zijn geupdate');
    }
}
