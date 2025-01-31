<?php

namespace App\Http\Controllers\Cms;

use App\Models\LandCatagories;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProductCatagoyRequest;

class CmsLandCatagoriesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductCatagoyRequest $request): RedirectResponse
    {
        // Variables
        $validated = $request->validated();


        LandCatagories::create([
            'name' => $validated['name'],
        ]);


        // returns the user back to the overview table
        return redirect()->route('cms.catagories.index')->withErrors('storeSucces', 'De nieuwe land catagorie is succesvol aangemaakt.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LandCatagories $catagorie): RedirectResponse
    {
        $name = $catagorie->name;

        $catagorie->delete();

        return redirect()->route('cms.catagories.index')->with('deleteSucces', "Product $name is succesvol verwijderd.");
    }
}
