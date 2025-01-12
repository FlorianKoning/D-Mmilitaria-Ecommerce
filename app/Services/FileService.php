<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\FileServiceInterface;

class FileService implements FileServiceInterface
{
    /**
     * Uploads the given image in the public file directory and return the url
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $fileName
     * @return string
     */
    public static function imageUpload(UploadedFile $file, string $fileName): string
    {
        $fileName = str_replace(' ', '-', $fileName);

        Storage::disk('public')->putFileAs($file, $fileName.'.png');

        return Storage::disk('public')->url('images/'.$fileName.'.png');
    }
}
