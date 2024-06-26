<?php

namespace App\Services;

use Intervention\Image\Laravel\Facades\Image;

class ImageService
{
    public function updateImage($model, $request)
    {
        $image = Image::read($request->file('image'));

        if (!empty($model->image)) {
            $currentImage = public_path() . $model->image;

            if (file_exists($currentImage) && $currentImage != public_path() . '/images/user-placeholder.png') {
                unlink($currentImage);
            }
        }

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        if ($request->width) {
            $image->crop(
                $request->width,
                $request->height,
                $request->left,
                $request->top,
            );
        }

        $name = time() . '.' . $extension;
        $image->save(storage_path('app/public/') . $name);
        $model->image = '/storage/' . $name;

        return $model;
    }
}
