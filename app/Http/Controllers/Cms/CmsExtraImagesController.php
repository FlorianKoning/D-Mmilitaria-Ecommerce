<?php

namespace App\Http\Controllers\Cms;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Services\FileService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class CmsExtraImagesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function create(Request $request, string $id): RedirectResponse
    {
        // Checks if a file was selected
        if ($request->hasFile('imageCreate') == false) {
            return redirect()->route('cms.products.create')->with('noImage', 'U moet wel een foto selecteren om een foto te uploaden!');
        }

        if (count($request->imageCreate) > 0) {
            $fileArray = FileService::multipleImages($request->imageCreate, $request->extraImageName);

            // Stores the new images in the database.
            foreach ($fileArray as $fileUrl) {
                ProductImage::create([
                    'image_name' => $fileUrl['name'],
                    'image_url' => $fileUrl['url'],
                    'product_id' => $id
                ]);
            }
        } else {
            // Stores the image and returns the location url.
            $fileUrl = FileService::extraImageUpload($request->imageCreate, $request->extraImageName);

            // Stores the new image in the database.
            ProductImage::create([
                'image_name' => $request->extraImageName,
                'image_url' => $fileUrl,
                'product_id' => $id
            ]);
        }

        // Returns the user to the create form
        return redirect()->route('cms.products.extra', $id)->with('extraImageSucces', 'De extra foto is succesfull toegevoegd');
    }



    /**
     * Show the form for editing the specified resource
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProductImage $productImage
     * @return RedirectResponse
     */
    public function edit(Request $request, ProductImage $productImage): RedirectResponse
    {
        // Sets up the new image url.
        $fileUrl = (isset($request->imageEdit)) ? FileService::extraImageUpload($request->imageEdit, $productImage->image_name) : null;


        // updates the product image
        $productImage->update([
            'image_name' => $request->extraImageName,
            'image_url' => ($fileUrl != null) ? $fileUrl : $productImage->image_url,
        ]);


        // Returns the user to the create form
        return redirect()->route('cms.products.extra', $productImage->product_id)->with('extraImageEdit', 'De extra foto is succesfull geupdate');
    }


    /**
     * Remove the specified resource from storage.
     * @param \App\Models\ProductImage $productImage
     * @return RedirectResponse
     */
    public function destroy(ProductImage $productImage): RedirectResponse
    {
        // Deletes the extra image
        $productImage->delete();

        // Returns the user to the create form
        return redirect()->route('cms.products.extra', $productImage->product_id)->with('deleteSucces', 'De extra foto is succesfull verwijderd');
    }
}
