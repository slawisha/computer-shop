<?php  namespace App\Services;

use Intervention\Image\Facades\Image;

class ImageIntervention {

    /**
     * @param $imageFile
     * @return Image
     */
    public function uploadImage($imageFile)
    {
        return app()->make('image')->make($imageFile);
        //return Image::make($imageFile);
    }

    /**
     * resize image file
     *
     * @param $image
     * @param $widerDimension
     * @return Image
     * @internal param $uploadedImage
     */
    public function resizeImageFile($image, $widerDimension)
    {
        if ( $image->width() >= $image->height() ) return $image->widen($widerDimension, function($constraint){
            $constraint->upsize();
        });

        return $image->heighten($widerDimension, function($constraint){
            $constraint->upsize();
        });

    }

    /**
     * save image file
     *
     * @param $image
     * @param $path
     * @param $quality
     * @return bool
     */
    public function saveImageFile($image, $path, $quality)
    {
        $image->save($path, $quality);
    }
}