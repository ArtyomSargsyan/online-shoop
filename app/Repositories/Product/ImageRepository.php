<?php

namespace App\Repositories\Product;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageRepository
{
    /**
     * @param $images
     * @param $userId
     * @param $productId
     * @return false|string[]
     */
    public function store($images, $userId, $productId)
    {
        if (!is_null($images)) {
            foreach ($images as $image) {
                $path = Storage::putFile("public/" . $userId, $image);
                $pat[] = $path;
            }
        }

        $image = json_encode($pat);
        $imgTrim = trim($image, "[]");
        $imagesArr = explode(",", $imgTrim);

        foreach ($imagesArr as $image) {
            image::create([
                "image" => $image,
                "product_id" => $productId,
            ]);
        }

        return $imagesArr;
    }
}
