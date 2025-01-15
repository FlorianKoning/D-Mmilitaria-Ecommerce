<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCatagoyRequest;
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
            'columnNames' => Product_category::$columnNames
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): View
    {
        return view('cms.catagories.catagories-create');
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductCatagoyRequest $request): RedirectResponse
    {
        // Variables
        $validated = $request->validated();


        Product_category::create([
            'name' => $validated['name'],
        ]);


        // returns the user back to the overview table
        return redirect()->route('cms.catagories.index')->withErrors('storeSucces', 'De nieuwe catagorie is succesvol aangemaakt.');
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Models\Product_category $catagorie
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Product_category $catagorie): View
    {
        return view('cms.catagories.catagories-edit', [
            'catagorie' => $catagorie
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param \App\Http\Requests\ProductCatagoyRequest $request
     * @param \App\Models\Product_category $catagorie
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductCatagoyRequest $request, Product_category $catagorie): RedirectResponse
    {
        // Variables
        $validated = $request->validated();


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
