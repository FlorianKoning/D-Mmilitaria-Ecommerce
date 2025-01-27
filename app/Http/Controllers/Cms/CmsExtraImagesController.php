<?php

namespace App\Http\Controllers\Cms;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Services\FileService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class CmsExtraImagesController extends Controller
{
    public function create(Request $request, string $id): RedirectResponse
    {
        // Stores the image and returns the location url.
        $fileUrl = FileService::extraImageUpload($request->extraImage, $request->extraImageName);


        // Stores the new image in the database.
        ProductImage::create([
            'image_name' => $request->extraImageName,
            'image_url' => $fileUrl,
            'product_id' => $id
        ]);


        return redirect()->route('cms.products.create')->with('extraImageSucces', 'De extra foto is succesfull toegevoegd');
    }
}
