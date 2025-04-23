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
        $newFileName = self::uploadPreset($file, $fileName);

        return Storage::disk('public')->url('images/'.$newFileName.'.png');
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
     * Uploads the given images in the array and returns an array with all the image url.
     * @param array $images
     * @param string $filenName
     * @return array
     */
    public static function multipleImages(array $images, string $fileName): array
    {
        $urlArray = array();

        foreach ($images as $key => $image) {
            // Creates the correct file name
            $name = str_replace(',', '', str_replace(' ', '-', $fileName));
            if ($key != 0) {
                $newKey = $key + 1;
                $name .= "(".$newKey.")";
            }

            // Uploads the file
            self::uploadPreset($image, $name, 'extraImages');

            // Gets the url of the uploaded file.
            $urlArray[] = [
                'name' => $name,
                'url' => Storage::disk('extraImages')->url($name.'.png'),
            ];
        }

        return $urlArray;
    }


    /**
     * Stores the file in the directory.
     * Should be used to just upload the file in the application.
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $fileName
     * @return void
     */
    private static function uploadPreset(UploadedFile $file, string $fileName, string $option = 'public'): string
    {
        $fileName = str_replace(',', '', str_replace(' ', '-', $fileName));

        Storage::disk($option)->putFileAs($file, $fileName.'.png');

        return $fileName;
    }
}
