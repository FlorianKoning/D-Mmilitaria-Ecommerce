<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

interface FileServiceInterface
{
    public static function imageUpload(UploadedFile $file, string $fileName): string;
}
