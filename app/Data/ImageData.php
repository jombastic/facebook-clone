<?php

namespace App\Data;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;

class ImageData extends Data
{
    public function __construct(
        //
    )
    {
    }

    public static function fromUploadedImage(UploadedFile $file): self
    {
        $stored = $file->store('images', 'public');

        return new ImageData(
            url($stored),
            $file->getSize(),
        );
    }
}
