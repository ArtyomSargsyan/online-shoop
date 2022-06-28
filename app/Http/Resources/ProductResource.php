<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    private array $imagesArr;
    private object $product;

    /**
     * @param object $product
     * @param array $imagesArr
     */
    public function __construct(object $product, array $imagesArr)
    {

        $this->imagesArr = $imagesArr;
        $this->product = $product;
    }

    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'name' => $this->product->name,
            'price' => $this->product->price,
            'description' => $this->product->description,
            'display Name' => $this->product->display_name,
            'images path' => $this->imagesArr
        ];
    }
}
