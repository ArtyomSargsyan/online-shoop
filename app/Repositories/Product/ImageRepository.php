<?php

namespace App\Repositories\Product;

use App\Models\Image;


class ImageRepository
{
    /**
     * @param string $image
     * @param int $productId
     * @return void
     */
    public function send( string $image , int $productId)
    {
        image::create([
            'image' => $image,
            'product_id' => $productId

        ]);
    }

}