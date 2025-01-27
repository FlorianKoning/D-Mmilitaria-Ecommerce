<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\FileServiceInterface;

class FileService implements FileServiceInterface
{
    /**
     * Uploads the given image in the public file directory and return the url.
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $fileName
     * @return string
     */
    public static function imageUpload(UploadedFile $file, string $fileName): string
    {
        self::uploadPreset($file, $fileName);

        return Storage::disk('public')->url('images/'.$fileName.'.png');
    }


    /**
     * Uploads the given image in the public extraImages direcotry and returns the url.
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $fileName
     * @return void
     */
    public static function extraImageUpload(UploadedFile $file, string $fileName): string
    {
        self::uploadPreset($file, $fileName, 'extraImages');

        return Storage::disk('public')->url('extraImages/'.$fileName.'.png');
    }



    /**
     * Stores the file in the directory.
     * Should be used to just upload the file in the application.
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $fileName
     * @return void
     */
    private static function uploadPreset(UploadedFile $file, string $fileName, string $option = 'public'): void
    {
        $fileName = str_replace(' ', '-', $fileName);

        Storage::disk($option)->putFileAs($file, $fileName.'.png');
    }
}
