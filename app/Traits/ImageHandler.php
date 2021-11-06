<?php

namespace App\Traits;

use Intervention\Image\Facades\Image;



trait ImageHandler
{
    public function uploadImage($image, $path, $width, $height)
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move($path, $imageName);
        $this->resizeImage($path . '/' . $imageName, $width, $height);
        return $imageName;
    }

    public function resizeImage($imagePath, $width, $height)
    {
        $img = Image::make($imagePath);
        $img->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($imagePath);
    }

}