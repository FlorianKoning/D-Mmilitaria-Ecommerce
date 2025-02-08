<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCatagoyRequest;
use App\Models\LandCatagories;
use App\Models\Product_category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CmsCatagoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        return view('cms.catagories.catagories-index', [
            'catagories' => Product_category::all(),
            'columnNames' => Product_category::$columnNames,

            'landCatagories' => LandCatagories::all(),
            'landColumnNames' => LandCatagories::$columnNames,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\View\View
     */
    public function create(bool $check = null): View
    {
        return view('cms.catagories.catagories-create', [
            'check' => ($check) ? true : false,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductCatagoyRequest $request, bool $check = null): RedirectResponse
    {
        // Variables
        $validated = $request->validated();

        // Checks if land catagorie was selected
        if ($check) {
            LandCatagories::create([
                'name' => $validated['name'],
            ]);
        } else {
            Product_category::create([
                'name' => $validated['name'],
            ]);
        }

        // returns the user back to the overview table
        return redirect()->route('cms.catagories.index')->withErrors('storeSucces', 'De nieuwe catagorie is succesvol aangemaakt.');
    }


    /**
     * Show the form for editing the specified resource.
     * @param string $id
     * @param bool $check
     * @return View
     */
    public function edit(string $id, bool $check = null): View
    {
        $catagorie = ($check) ? LandCatagories::find($id) : Product_category::find($id);

        return view('cms.catagories.catagories-edit', [
            'catagorie' => $catagorie,
            'check' => ($check) ? true : false,
        ]);
    }


    /**
     * Update the specified resource in storage.
     * @param \App\Http\Requests\ProductCatagoyRequest $request
     * @param \App\Models\Product_category $catagorie
     * @param bool $check
     * @return RedirectResponse
     */
    public function update(ProductCatagoyRequest $request, string $id, bool $check = null): RedirectResponse
    {
        // Variables
        $validated = $request->validated();
        $catagorie = ($check) ? LandCatagories::find($id) : Product_category::find($id);


        // Updates the catagorie
        $catagorie->update([
            'name' => $validated['name']
        ]);


        // returns the user back to the overview table
        return redirect()->route('cms.catagories.index')->withErrors('updateSucces', "$catagorie->name is succesvol geupdate.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product_category $catagorie)
    {
        $name = $catagorie->name;

        $catagorie->delete();

        return redirect()->route('cms.catagories.index')->with('deleteSucces', "Product $name is succesvol verwijderd.");
    }
}
