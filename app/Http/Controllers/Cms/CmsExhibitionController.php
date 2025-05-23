<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\CmsExhibitionRequest;
use App\Models\Exhibition;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CmsExhibitionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        return view("cms.exhibitions.index", [
            'exhibitions' => Exhibition::all(),
            'columnNames' => Exhibition::$columnNames,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view("cms.exhibitions.create");
    }

    /**
     * Store a newly created resource in storage.
     * @param \App\Http\Requests\CmsExhibitionRequest $request
     * @return RedirectResponse
     */
    public function store(CmsExhibitionRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Exhibition::create([
            "exhibition_name" => $validated["exhibition_name"],
            "exhibition_location" => $validated["exhibition_location"],
            "exhibition_date" => $validated["exhibition_date"],
            "exhibition_opening_time" => $validated["exhibition_opening_time"],
            "exhibition_closing_time" => $validated["exhibition_closing_time"],
            "present" => (isset($validated["present"])) ? true: false,
        ]);

        return redirect()->route('cms.exhibitions.index')->with('success', 'Een beurs is toegevoegd aan de database.');
    }

    /**
     * Updates the present value of the exhibition.
     * @param \App\Models\Exhibition $exhibition
     * @return RedirectResponse
     */
    public function updatePresent(Exhibition $exhibition): RedirectResponse
    {
        $present = $exhibition['present'];

        $exhibition->update([
            'present' => ($present == 1) ? false : true
        ]);

        return redirect()->route('cms.exhibitions.index')->with('success', 'De aanwezigheid is succesvol geupdate.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exhibition $exhibition): View
    {
        return view("cms.exhibitions.edit", [
            'exhibition' => $exhibition
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CmsExhibitionRequest $request, Exhibition $exhibition): RedirectResponse
    {
        $validated = $request->validated();

        $exhibition->update([
            "exhibition_name" => $validated["exhibition_name"],
            "exhibition_location" => $validated["exhibition_location"],
            "exhibition_date" => $validated["exhibition_date"],
            "exhibition_opening_time" => $validated["exhibition_opening_time"],
            "exhibition_closing_time" => $validated["exhibition_closing_time"],
            "present" => (isset($validated["present"])) ? true: false,
        ]);

        return redirect()->route('cms.exhibitions.index')->with('success', 'De beurs is succesvol geupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exhibition $exhibition): RedirectResponse
    {
        // Deletes the exhibition
        $exhibition->delete();

        return redirect()->route('cms.exhibitions.index')->with('success','De beurs was succesvol verwijderd');
    }
}