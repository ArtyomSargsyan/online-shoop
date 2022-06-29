<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * @var object
     */
    private object $product;

    /**
     * @var array
     */
    private array $images;

    /**
     * @param object $product
     * @param array $images
     */
    public function __construct(object $product, array $images)
    {
        $this->product = $product;
        $this->images = $images;
    }

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'name' => $this->product->name,
            'displayName' => $this->product->displayName,
            'price' => $this->product->price,
            'description' => $this->product->description,
            'imagePath' => new ImageResource($this->images)
        ];
    }
}
