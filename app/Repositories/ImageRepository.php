<?php  namespace App\Repositories;


use App\Image;
use App\Services\ImageIntervention;

class ImageRepository {

    /**
     * @var ImageIntervention
     */
    private $imageIntervention;

    function __construct(ImageIntervention $imageIntervention)
    {
        $this->imageIntervention = $imageIntervention;
    }

    /**
     * Upload images
     *
     * @param $images
     * @param $modelNumber
     * @param $productId
     * @param $imageOrder
     */
    public function uploadImages($images, $modelNumber, $productId, $imageOrder)
    {
        foreach ($images as $image)
        {
            if ( !is_null($image) )
            {
                $this->makeFolder('images/' . $modelNumber);

                $path = 'images/' . $modelNumber . '/' . time() . '-' . $image->getClientOriginalName();

                $this->createImage($image, $path);

                $imageThumbPath = $this->createImageThumb($path, $image);

                $this->save($path, $imageThumbPath, $imageOrder, $productId);
            }
        }
    }

    /**
     * save uploaded image into the database
     *
     * @param $url
     * @param $thumbUrl
     * @param $order
     * @param $productId
     */
    public function save($url, $thumbUrl, $order, $productId)
    {
        Image::create([
            'product_id' => $productId,
            'url'        => $url,
            'thumb_url'  => $thumbUrl,
            'order'      => $order
        ]);
    }

    /**
     * count images
     *
     * @return int
     */
    public function count()
    {
        return Image::all()->count();
    }

    /**
     * @param $folder
     */
    private function makeFolder($folder)
    {
        if ( !file_exists($folder) && !empty($folder) )
            \File::makeDirectory($folder, 0777, true, true);
    }

    /**
     * @param $image
     * @param $path
     */
    private function createImage($image, $path)
    {
        $uploadedImage = $this->imageIntervention->uploadImage($image->getRealPath());

        $resizedImage = $this->imageIntervention->resizeImageFile($uploadedImage, 800);

        $this->imageIntervention->saveImageFile($resizedImage, $path, 60);
    }

    /**
     * @param $path
     * @param $image
     * @return mixed
     */
    private function createImageThumb($path, $image)
    {
        $savedImage = $this->imageIntervention->uploadImage($path);

        $imageThumb = $this->imageIntervention->resizeImageFile($savedImage, 120);

        $extension = $image->getClientOriginalExtension();

        $imageThumbPath = str_replace('.' . $extension, '_thumb.' . $extension, $path);

        $this->imageIntervention->saveImageFile($imageThumb, $imageThumbPath, 80);

        return $imageThumbPath;
    }
}