<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductFeature;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CmsExtraFeaturesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function create(Request $request, string $id): RedirectResponse
    {
        // Creates the new product features
        ProductFeature::create([
            'feature' => $request->featureName,
            'product_id' => $id
        ]);


        // Returns the user to the create form
        return redirect()->route('cms.products.extra', $id)->with('productFeaturesSucces', 'Het product feature is succesfull toegevoegd');
    }


    /**
     * Show the form for editing the specified resource
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProductFeature $productFeature
     * @return RedirectResponse
     */
    public function edit(Request $request, ProductFeature $productFeature): RedirectResponse
    {
        // Updates the features
        $productFeature->update([
            'feature' => $request->featureName
        ]);


        // Returns the user to the create form
        return redirect()->route('cms.products.extra', $productFeature->product_id)->with('featureEdit', 'De feature is succesfull geupdate');
    }


    /**
     * Remove the specified resource from storage.
     * @param \App\Models\ProductFeature $productFeature
     * @return RedirectResponse
     */
    public function destroy(ProductFeature $productFeature): RedirectResponse
    {
        // Deletes the extra feature
        $productFeature->delete();

        // Returns the user to the create form
        return redirect()->route('cms.products.extra', $productFeature->product_id)->with('featureDeleteSucces', 'De feature is succesfull verwijderd');
    }
}
